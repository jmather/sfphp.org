class server::php {
  require server::yum

  File {
    owner   => "root",
    group   => "root",
    mode    => 644,
    require => Package["httpd"],
  }

  package { "libmcrypt":
    ensure  => present,
  }

  include server::php56

  file { "/etc/php.ini":
    replace => true,
    ensure  => present,
    source  => "puppet:///modules/server/php.ini",
  }
}