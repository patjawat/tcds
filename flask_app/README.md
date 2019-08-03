# flask_app
echo "# flask_app" >> README.md
git init
git add README.md
git commit -m "first commit"
git remote add origin https://github.com/patjawat/flask_app.git
git push -u origin master


###### docker run
docker run -d -p 5000:5000 my_flask_app:latest

#### docker build image
docker build -t my_flask_app:latest .