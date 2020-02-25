class EcolifeSensors {
  constructor() {
    this.isLoaded = false;
    this.mapElem = document.querySelector('#ecolife-sensors-map');
    this.token = 'pk.eyJ1IjoiZmFuY3lib3hwbCIsImEiOiJjazcwZzFwdzgwOWxkM2xtcGRudWN3bDlpIn0.F_9R6_YuG0Nej3RZVCwc1g';
    this.observer = null;

    if (this.mapElem) {
      this.observerMap();
    }
  }

  initMap() {
    L.mapbox.accessToken = this.token;
    const map = L.mapbox.map(this.mapElem, 'mapbox.streets')
    .setView([52.069442, 19.480311], 7);

    map.scrollWheelZoom.disable();

    const featureLayer = L.mapbox.featureLayer()
      .loadURL('https://dev.ecolife.eu.com:58200/EcoLife/MeasurePoint/publicDevices')
      .on('layeradd', function (e) {
        const marker = e.layer;
        const icon = marker.feature.properties.icon;
        icon.iconUrl = 'https://www.ecolife.eu.com' + icon.iconUrl;
        marker.setIcon(L.icon(icon));
      })
      .addTo(map);

    map.fitBounds([
      [54.288776, 23.166448],
      [50.409003, 16.302454],
    ], {
      padding: [10, 10]
    });

    if (window.innerWidth <= 1024) {
      map.dragging.disable();
    }
  }

  observerMap() {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          this.lazyLoadMap();
        }
      });
    });

    observer.observe(this.mapElem);
  }

  lazyLoadMap() {
    if (!this.isLoaded) {
      const script = document.createElement('script');
      script.src = 'https://api.mapbox.com/mapbox.js/v3.2.1/mapbox.js';
      script.onload = () => {
        this.loadStyles('https://api.mapbox.com/mapbox.js/v3.2.1/mapbox.css')
        this.initMap();
      };
      document.getElementsByTagName('head')[0].appendChild(script);
    }

    this.isLoaded = true;
  }

  loadStyles(path, preload = false) {
    const head = document.getElementsByTagName('head')[0];
    const link = document.createElement('link');
    link.href = path;
    link.type = 'text/css';
    link.rel = `stylesheet${ preload ? ` preload` : `` }`;
    link.as = 'style';
    head.appendChild(link);
  }
}

window.addEventListener('DOMContentLoaded', () => {
  new EcolifeSensors();
});
