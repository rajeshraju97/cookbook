const cacheName = "cookbook-pwa-v1";
const resourcesToCache = [
    "/",
    "/css/main.css",
    "/js/main.js",
    "/favicon.png",
    "/img/img1.png",
];

// Install service worker and cache resources
self.addEventListener("install", (event) => {
    event.waitUntil(
        caches.open(cacheName).then((cache) => {
            return cache.addAll(resourcesToCache);
        })
    );
});

// Activate service worker and delete old caches
self.addEventListener("activate", (event) => {
    const cacheWhitelist = [cacheName];
    event.waitUntil(
        caches.keys().then((cacheNames) => {
            return Promise.all(
                cacheNames.map((cache) => {
                    if (!cacheWhitelist.includes(cache)) {
                        return caches.delete(cache);
                    }
                })
            );
        })
    );
});

// Fetch from cache or network
self.addEventListener("fetch", (event) => {
    event.respondWith(
        caches.match(event.request).then((cachedResponse) => {
            return cachedResponse || fetch(event.request);
        })
    );
});
