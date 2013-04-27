redis_pinba
===========

Wrapper to PHP [nicolasff's Redis PHP extension](https://github.com/nicolasff/phpredis) with Pinba timers.

Learn more about Pinba: http://pinba.org/

## Performance result ##

Generally, slowdown is great - about 1.8x, BUT it is less then 0.0001 per one request, so for page with 10-30 Redis requests total loss will be around measurement error.

Here are [performance_test.php](performance_test.php) results:

  Doing 10000 GET requests...
  Redis raw time: 0.2997s
  RedisPinba psoxy time: 0.48737s
  Slowdown: 1.6262x, 0.0000188s per request