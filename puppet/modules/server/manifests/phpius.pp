class server::phpius (
  $ius_php_version = 'php55u',
  $memcache_package = 'memcached',
  $with_xdebug = true,
  $with_apc = false
) {
  require server::yum

  File {
    owner   => "root",
    group   => "root",
    mode    => 644,
    require => Package["httpd"],
    notify  => Service["httpd"]
  }

  package { "$ius_php_version":
    ensure  => present,
  }

  package { "$ius_php_version-cli":
    ensure  => present,
  }

  package { "$ius_php_version-common":
    ensure  => present,
  }

  package { "$ius_php_version-devel":
    ensure  => present,
  }

  package { "$ius_php_version-gd":
    ensure  => present,
  }

  package { "$ius_php_version-mcrypt":
    require => Package['libmcrypt'],
    ensure  => present,
  }

  package { "$ius_php_version-intl":
    ensure  => present,
  }

  package { "$ius_php_version-mbstring":
    ensure  => present,
  }

  package { "$ius_php_version-mysql":
    ensure  => present,
  }

  package { "$ius_php_version-pdo":
    ensure  => present,
  }

  package { "$ius_php_version-pear":
    ensure  => present,
  }

  package { "$ius_php_version-soap":
    ensure  => present,
  }

  package { "$ius_php_version-xml":
    ensure  => present,
  }

  package { "$ius_php_version-pecl-$memcache_package":
    ensure  => present,
  }

  if ($with_xdebug) {
    package { "$ius_php_version-pecl-xdebug":
      ensure  => present,
      require => Exec["grab-epel"]
    }
  }

  if ($with_apc) {
    package { "$ius_php_version-pecl-apc":
      ensure  => present,
    }
  }

  class server::phpius::uninstall {
    package{ ['php']: ensure => absent }
  }
}