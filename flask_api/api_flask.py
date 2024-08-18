from flask_mysqldb import MySQL
from flask import request
from flask_cors import CORS
from flask import *
import re
from time import sleep
import datetime 
import  json
import aspose.pdf as ap
import os

app = Flask(__name__)
CORS(app)
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'mypj'
app.config['MYSQL_PORT'] = 3306 
mysql = MySQL(app)
@app.route('/')
def index():
    try:
        cur = mysql.connection.cursor()
        cur.execute("SELECT * FROM admin")
        users = cur.fetchall()
        cur.close()
        return str(users)
    except Exception as e:
        print(e)
        return "An error occurred"






@app.route('/apiv1getproduct/', methods=['GET'])
def lastpost():
    try:
        token = str(request.args.get('jwt'))
        idct = str(request.args.get('id'))
    except:
        token='null'
        idct='0'

    jwt=json.load(open('apitoken.json'))['jwt']
    if str(jwt).strip()==str(token).strip():
        try:
            cur = mysql.connection.cursor()
            cur.execute(f"SELECT * FROM product where id_catalogue={idct}")
            pd = cur.fetchall()
            cur.close()
            response = make_response(jsonify(pd))
            response.headers['Access-Control-Allow-Origin'] = '*'
    
            return response
        except Exception as e:
            response = make_response('An error occurred')
            response.headers['Access-Control-Allow-Origin'] = '*'
            return response 
    else:
        response = make_response('api not allowd')
        response.headers['Access-Control-Allow-Origin'] = '*'
        return response


@app.route('/genpdf/', methods=['GET'])
def confirmeproduct():
    try:
        token = str(request.args.get('jwt'))
        email = str(request.args.get('email'))
        product_name= str(request.args.get('pdname'))
        info_product= str(request.args.get('infopd'))
        date=str(request.args.get('date'))
    except:
        token='null'
        email='null'
        product_name='null'
        info_product= 'null'
        date='null'
    jwt=json.load(open('apitoken.json'))['jwt']
    if str(jwt).strip()==str(token).strip():
            document = ap.Document()
            page = document.pages.add()
            text_fragment = ap.text.TextFragment(f'''
                thanks for your order ! 
    ------------------------------------------------
    
    |-email:{email}  

    |-product name: {product_name} 

    |-info product: {info_product} 

    |-date: {date} 

    ---------------------------------------------------------------
                by digital store  ,  nouredine kaoine



''')
            page.paragraphs.add(text_fragment)
            document.save(f"pdf/{product_name}.pdf")
            response = make_response(send_file(f"pdf/{product_name}.pdf", as_attachment=True))
            response.headers['Access-Control-Allow-Origin'] = '*'
            return response
    else:
        response = make_response('api not allowed')
        response.headers['Access-Control-Allow-Origin'] = '*'
        return response





if __name__ == "__main__":
    app.run(debug=True , host='127.0.0.1' )

