AuthType Basic
AuthName "Password Protected Area"
AuthUserFile ../htdocs/medt-3/UEBUNGEN/UE8/.htpasswd
Require valid-user
<IfModule mod_rewrite.c>
RewriteEngine on
RewriteRule ^(.*)$ dbaccess.php [NC,L]
</IfModule>