@servers(['web-1' => 'root@192.168.23.51', 'web-2' => 'root@192.168.23.52'])

@task('deploy', ['on' => ['web-1', 'web-2'], 'parallel' => true])
    cd /var/www/lblaravel
    git pull origin master
    composer install --no-dev
    php artisan migrate --force
@endtask

@error
    echo "$task failed";
    exit(1);
@enderror