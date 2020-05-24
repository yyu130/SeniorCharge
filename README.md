<p align="center"><img src="seniorcharge/public/image/logo.png" width="400"></p>

# Sr.Charge

Sr.Charge website was developed to help the Homeless Elderly find Charging Stations in Melbourne where they can charge their devices for free.

It can holistically support its users select the right charging station based on its location, services available on-site, accessibility, feedback of previous users on the said station, and how to get there. These features were based on the data retrieved from several sources and then aligned with research-based needs of the homeless elderly.

## Getting Started

The detailed prerequisites and installation can be found on [Laravel](https://laravel.com/docs/7.x/installation) website. These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. 

## Built With

* [Laravel](https://laravel.com/) - The PHP web framework used
* [XAMPP](https://www.apachefriends.org/index.html) - The most popular PHP development environment and local cross-platform web server solution stack package 
* [phpMyAdmin](https://www.phpmyadmin.net/) - The administration tool for Sr.Charge database, which is using MySQL
* [Intellij](https://www.jetbrains.com/idea/) - The IDE used for writting source code
* [Github](https://github.com/) - The development platform used for storing source code and version control 

## Infrastructure/Security

 - [Hostinger](https://www.hostinger.com/) for Web Hosting - It is paid monthly, the current expire date is 12th-June-2020. It also provides SSL Certificate for [Sr.Charge](https://seniorcharge.me), which will not be expired if the hosting is paid uninterrupted. 
 - [ZeroSSL](https://zerossl.com/) for Free SSL Certificate - This website is used to apply SSL Certificates for two subdomains ([iteration 1](https://iteration1.seniorcharge.me) and [iteration 2](https://iteration2.seniorcharge.me)). The expired date is 18th-August-2020 and 17th-August-2020 respectively. 

## Deployment 

Sr.Charge website is deployed on the [Hostinger](https://www.hostinger.com/), which provides a stable and fast web hosting enviornment. It also provides SSL certificate and several subdomains which is matched our IE requests. Here is the list of modifications in some files to make the webiste alive:
* [index.php](seniorcharge/public/index.php) in public_html folder on host file manager - Change the router for loader
* [.htaccess](seniorcharge/public/.htaccess) in public_html folder on host file manager - Enable the SSL/HTTPS
* .env (which is not stored in Github due to the security issue) in seniorcharge folder on host file manger - Change the database connection from local side to host server side
* [database.php](seniorcharge/config/database.php) in seniorcharge folder on host file manager - Add one 'option' field in 'mysql' connection

## Data Maintenance 

* In collecting, wrangling, and restructuring the data, Python language was primarily used via Jupyter Notebook and hosted in [Google Colab](https://colab.research.google.com/notebooks/intro.ipynb#recent=true). The following python packages were used:
+ [Geopy](https://geopy.readthedocs.io/en/stable/) - Retrieves location data using either a given address or coordinates (longitude and latitude)
+ [Pandas](https://pandas.pydata.org/)- Restructures the data that is used for the database or for data visualisations and data analysis

* Data can be with updated one by oe or bulk by by following these [instructions](https://github.com/yyu130/SeniorCharge/blob/master/Data%20Maintenance/data_maintenance.md)
* All codes relevant to the data are available in the .ipnyb files of the [Data Maintenance](https://github.com/yyu130/SeniorCharge/tree/master/Data%20Maintenance) repository

## Contributing

When contributing to this repository, please first discuss the change you wish to make via issue, email, or any other method with Team B3 - Homage, who is the onwer of this repository, before making changes.

### Pull Request Process

- Ensure any install or build dependencies are removed before the end of the layer when doing a build.
- Update the README.md with details of changes to the interface, this includes new environment variables, exposed ports, useful file locations and container parameters.
- Increase the version numbers in any examples files and the README.md to the new version that this Pull Request would represent.
- You may merge the Pull Request in once you have the sign-off of two other developers, or if you do not have permission to do that, you may request the second reviewer to merge it for you.

## Versioning 

GitHub has been used for version control. It contains the record of all the development work and helps to quickly access the changes made in the past including data, coding scripts, notes etc. The GitHub workflow can be summarised by the “commit-pull-push” mantra, which is being adopted for project versioning.

Each file on GitHub has a history, so instead of having many files like SrCharge_1st_May.php, SrCharge_2st_May.php, there is only a single file and a user can explore its history to check how it looked in the past. 

For instance, the [Homepage](seniorcharge/resources/views/home.blade.php) file of the website has a ['histroy'](https://github.com/yyu130/SeniorCharge/commits/master/seniorcharge/resources/views/home.blade.php) button which displays its complete workflow. Additionally, there are three subdomains in place for the website. Below is the URL to the website:
- Iteration 1 - [https://iteration1.seniorcharge.me](https://iteration1.seniorcharge.me)
- Iteration 2 - [https://iteration2.seniorcharge.me](https://iteration2.seniorcharge.me)
- Final Product - [https://seniorcharge.me](https://seniorcharge.me)

## Authors

Sr.Charge is developed by Team B3 - Homage. Below is the list of project stakeholders:

* **Abhinav Choudhary** - *Product Owner / UI/UX Designer / Analyst* 
* **Jinyun Liu** - *UI/UX Designer / Analyst / Lead Graphics/Content* 
* **Rina Reinoso** - *Project Manager / Data Governance* 
* **Yinlong Yu** - *Lead Software Developer* 

## Code of Conduct

Since the application was developed with Laravel web framework the team reviewedand abided by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct) to make sure there is no incident of violation:

- Participants will be tolerant of opposing views.
- Participants must ensure that their language and actions are free of personal attacks and disparaging personal remarks.
- When interpreting the words and actions of others, participants should always assume good intentions.
- Behavior that can be reasonably considered harassment will not be tolerated.

## License

The website is built with Laravel - PHP web framework. The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
