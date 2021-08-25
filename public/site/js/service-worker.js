importScripts('/public/site/js/cache-polyfill.js');


self.addEventListener('install', function(e) {
    e.waitUntil(
        caches.open('airhorner').then(function(cache) {
            return cache.addAll([
                // '/',
                '/public/site/index.html',
                // '/index.html?homescreen=1',
                // '/?homescreen=1',
                // '/styles/main.css',
                // '/scripts/main.min.js',
            ]);
        })
    );
});
self.addEventListener('fetch', function(event) {
    console.log(event.request.url);
});

self.addEventListener('activate', function(event) {

    var cacheAllowlist = ['pages-cache-v1', 'blog-posts-cache-v1'];

    event.waitUntil(
        caches.keys().then(function(cacheNames) {
            return Promise.all(
                cacheNames.map(function(cacheName) {
                    if (cacheAllowlist.indexOf(cacheName) === -1) {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});

self.addEventListener('fetch', function(event) {
    console.log(event.request.url);

    event.respondWith(
        caches.match(event.request).then(function(response) {
            return response || fetch(event.request);
        })
    );
});
