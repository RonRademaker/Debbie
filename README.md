# Debbie
Web application health checker

# About
Debbie is named after one of collegues, who came with the idea of a health checker for our applications. Debbie will be a symfony application that checks the health of your application by performing basic checks. Web applications can subscribe to Debbie to add additional checks.

# Interfaces
Debbie will have three interfaces:

* Web interface that shows the state.
* HTTP response code for automatic enabled / disabling of nodes in HAProxy or monitoring tools like Nagios.
* API for more extensive monitoring.
