PHPSlickGrid Demo
=================

PHPSlickGrid picks up on the server side where SlickGrid stops, connecting SlickGrid to a MySQL table.  

## Features: 

* Is an extension to the excellent SlickGrid JavaScript gird/spreadsheet component. [SlickGrid](https://github.com/mleibman/SlickGrid)

* Provides a strong browser side caching mechanism.

* Synchronizes data between grids for each browser, providing for live updates.

* Allows each browser to customize the grid, sorting, sizing and positioning columns independent of the other users.

* Holds users place, when the user reopens the grid, it will attempt to restore the view exactly as it was left.

* Is read/write by default.

## Quick Start:

This repository uses submodules, so in addition to cloning, you will need to initialize and update the submodules:

```
git clone https://github.com/jstormes/PHPSlickGridDemo.git

cd PHPSlickGridDemo 

git submodule init

git submodule update
```

After you pull down the code and setup your DNS and Apache host, you will need to setup the sample database using the file /docs/sclick_demo1.sql.

Finally, you will need to add the MySQL user id and password to the file /application/configs/application.ini.


