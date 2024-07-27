// Installing service worker
const CACHE_NAME = 'wd1-zbierka';

/* Add relative URL of all the static content you want to store in
* cache storage (this will help us use our app offline)*/
let resourcesToCache = [
    '/libs/fontawesome/css/all.css',
    '/libs/fontawesome/webfonts/fa-brands-400.ttf',
    '/libs/fontawesome/webfonts/fa-regular-400.ttf',
    '/libs/fontawesome/webfonts/fa-solid-900.ttf',
    '/libs/fontawesome/webfonts/fa-v4compatibility.ttf',
    '/libs/libs/bootstrap/bootstrap.bundle.min.js',
    '/libs/libs/bootstrap/bootstrap.min.css',
    '/favicon.ico'];

self.addEventListener("install", e => {
    e.waitUntil(
        caches.open(CACHE_NAME).then(cache => {
            return cache.addAll(resourcesToCache);
        })
    );
});

// Cache and return requests
self.addEventListener("fetch", e => {
    e.respondWith(
        caches.match(e.request).then(response => {
            return response || fetch(e.request);
        })
    );
});

// Update a service worker
const cacheWhitelist = ['pepelum'];
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cacheName => {
                    if (cacheWhitelist.indexOf(cacheName) === -1) {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});