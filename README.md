Web interface for Recon-ng 

"Recon-ng Web" is a web interface for recon-ng and uses "recon-rpc" to execute commands and fetch data.

Requirements:

1. Recon-ng
2. PHP


Setup:

./recon-rpc -t xmlrpc -a IP_ADDRESS -p PORT

Run Recon-ng-Web in a PHP supporting web server and set RPC URL in "RPC Settings" page.


Problems:

1. Errors like "API Key not found" is not returned in response of RPC. Hence it is not shown in web interface.
2. Some verbose data is not returned in response of RPC. Hence it is not shown in web interface.
3. Raw response is shown in web interface. Future release will show response in tabular format and more organized.


Newly added features:

1. "Upload File" allows uploading file on server which can be used as input file in different modules.

Note: Recon-ng and Recon-ng-Web should be running on the same server for this feature to work.


We are trying to fix the problems and bring more features and ease of use.


IMPORTANT: Please don't use it in production because the source code has not been audited for vulnerabilities especially CSRF and XSS.