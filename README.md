The database connection information are in app/config/parameters.yml

Use this command to load data :

> php app/console doctrine:fixtures:load

It'will create the tables and insert data into them .... ( DoctrineFixturesBundle )

I have also used FOSUserBundle so you could use commands to create users and admins.

I have used FOSRestBundle and JMSSerializerBundl for web services. Use this command to get the list of all routes
> php app/console router:debug

for example if you want to get users in JSON format you will find the route something like /api/users (/api/users.xml if you want data in xml format).

https://blog.hosni.me/2016/11/isimm-3eme-la-info-pfe-e-commerce.html
