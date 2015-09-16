<?php
require 'recipe/symfony.php';

serverList('app/config/servers.yml');

set('repository', 'https://github.com/user/app.git');

task('reload:php-fpm', function () {
    run('sudo /usr/sbin/service php5-fpm reload');
});

after('deploy', 'reload:php-fpm');
after('rollback', 'reload:php-fpm');