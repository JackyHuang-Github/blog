<<<<<<< HEAD
import DeviceDetector from "https://cdn.skypack.dev/device-detector-js@2.2.10";
const mpHands = window;
const drawingUtils = window;
const controls = window;
const controls3d = window;

// Usage: testSupport({client?: string, os?: string}[])
// Client and os are regular expressions.
// See: https://cdn.jsdelivr.net/npm/device-detector-js@2.2.10/README.md for
// legal values for client and os
testSupport([
  {client: 'Chrome'},
]);

function testSupport(supportedDevices:{client?: string; os?: string;}[]) {
  const deviceDetector = new DeviceDetector();
  const detectedDevice = deviceDetector.parse(navigator.userAgent);

  let isSupported = false;
  for (const device of supportedDevices) {
    if (device.client !== undefined) {
      const re = new RegExp(`^${device.client}$`);
      if (!re.test(detectedDevice.client.name)) {
        continue;
      }
    }
    if (device.os !== undefined) {
      const re = new RegExp(`^${device.os}$`);
      if (!re.test(detectedDevice.os.name)) {
        continue;
      }
    }
    isSupported = true;
    break;
  }
  if (!isSupported) {
    alert(`This demo, running on ${detectedDevice.client.name}/${detectedDevice.os.name}, ` +
          `is not well supported at this time, continue at your own risk.`);
  }
}

// Our input frames will come from here.
const videoElement =
    document.getElementsByClassName('input_video')[0] as HTMLVideoElement;
const canvasElement =
    document.getElementsByClassName('output_canvas')[0] as HTMLCanvasElement;
const controlsElement =
    document.getElementsByClassName('control-panel')[0] as HTMLDivElement;
const canvasCtx = canvasElement.getContext('2d')!;

const config = {locateFile: (file: string) => {
  return `https://cdn.jsdelivr.net/npm/@mediapipe/hands@${mpHands.VERSION}/${file}`;
}};

// We'll add this to our control panel later, but we'll save it here so we can
// call tick() each time the graph runs.
const fpsControl = new controls.FPS();

// Optimization: Turn off animated spinner after its hiding animation is done.
const spinner = document.querySelector('.loading')! as HTMLDivElement;
spinner.ontransitionend = () => {
  spinner.style.display = 'none';
};

const landmarkContainer = document.getElementsByClassName(
                              'landmark-grid-container')[0] as HTMLDivElement;
const grid = new controls3d.LandmarkGrid(landmarkContainer, {
  connectionColor: 0xCCCCCC,
  definedColors:
      [{name: 'Left', value: 0xffa500}, {name: 'Right', value: 0x00ffff}],
  range: 0.2,
  fitToGrid: false,
  labelSuffix: 'm',
  landmarkSize: 2,
  numCellsPerAxis: 4,
  showHidden: false,
  centered: false,
});

function onResults(results: mpHands.Results): void {
  // Hide the spinner.
  document.body.classList.add('loaded');

  // Update the frame rate.
  fpsControl.tick();

  // Draw the overlays.
  canvasCtx.save();
  canvasCtx.clearRect(0, 0, canvasElement.width, canvasElement.height);
  canvasCtx.drawImage(
      results.image, 0, 0, canvasElement.width, canvasElement.height);
  if (results.multiHandLandmarks && results.multiHandedness) {
    for (let index = 0; index < results.multiHandLandmarks.length; index++) {
      const classification = results.multiHandedness[index];
      const isRightHand = classification.label === 'Right';
      const landmarks = results.multiHandLandmarks[index];
      drawingUtils.drawConnectors(
          canvasCtx, landmarks, mpHands.HAND_CONNECTIONS,
          {color: isRightHand ? '#00FF00' : '#FF0000'});
      drawingUtils.drawLandmarks(canvasCtx, landmarks, {
        color: isRightHand ? '#00FF00' : '#FF0000',
        fillColor: isRightHand ? '#FF0000' : '#00FF00',
        radius: (data: drawingUtils.Data) => {
          return drawingUtils.lerp(data.from!.z!, -0.15, .1, 10, 1);
        }
      });
    }
  }
  canvasCtx.restore();

  if (results.multiHandWorldLandmarks) {
    // We only get to call updateLandmarks once, so we need to cook the data to
    // fit. The landmarks just merge, but the connections need to be offset.
    const landmarks = results.multiHandWorldLandmarks.reduce(
        (prev, current) => [...prev, ...current], []);
    const colors = [];
    let connections: mpHands.LandmarkConnectionArray = [];
    for (let loop = 0; loop < results.multiHandWorldLandmarks.length; ++loop) {
      const offset = loop * mpHands.HAND_CONNECTIONS.length;
      const offsetConnections =
          mpHands.HAND_CONNECTIONS.map(
              (connection) =>
                  [connection[0] + offset, connection[1] + offset]) as
          mpHands.LandmarkConnectionArray;
      connections = connections.concat(offsetConnections);
      const classification = results.multiHandedness[loop];
      colors.push({
        list: offsetConnections.map((unused, i) => i + offset),
        color: classification.label,
      });
    }
    grid.updateLandmarks(landmarks, connections, colors);
  } else {
    grid.updateLandmarks([]);
  }
}

const hands = new mpHands.Hands(config);
hands.onResults(onResults);

// Present a control panel through which the user can manipulate the solution
// options.
new controls
    .ControlPanel(controlsElement, {
      selfieMode: true,
      maxNumHands: 2,
      modelComplexity: 1,
      minDetectionConfidence: 0.5,
      minTrackingConfidence: 0.5
    })
    .add([
      new controls.StaticText({title: 'MediaPipe Hands'}),
      fpsControl,
      new controls.Toggle({title: 'Selfie Mode', field: 'selfieMode'}),
      new controls.SourcePicker({
        onFrame:
            async (input: controls.InputImage, size: controls.Rectangle) => {
              const aspect = size.height / size.width;
              let width: number, height: number;
              if (window.innerWidth > window.innerHeight) {
                height = window.innerHeight;
                width = height / aspect;
              } else {
                width = window.innerWidth;
                height = width * aspect;
              }
              canvasElement.width = width;
              canvasElement.height = height;
              await hands.send({image: input});
            },
      }),
      new controls.Slider({
        title: 'Max Number of Hands',
        field: 'maxNumHands',
        range: [1, 4],
        step: 1
      }),
      new controls.Slider({
        title: 'Model Complexity',
        field: 'modelComplexity',
        discrete: ['Lite', 'Full'],
      }),
      new controls.Slider({
        title: 'Min Detection Confidence',
        field: 'minDetectionConfidence',
        range: [0, 1],
        step: 0.01
      }),
      new controls.Slider({
        title: 'Min Tracking Confidence',
        field: 'minTrackingConfidence',
        range: [0, 1],
        step: 0.01
      }),
    ])
    .on(x => {
      const options = x as mpHands.Options;
      videoElement.classList.toggle('selfie', options.selfieMode);
      hands.setOptions(options);
    });
=======
// Dev Version
// https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js

// Vue App
// https://vuejs.org/v2/guide/transitions.html#Staggering-List-Transitions
const app = new Vue({
  el: '#vjs-app',
  data() {
    return {
        selected: false,
        modalOrigin: '0px 0px',
        // offsetTop: '0px',
        albums: [
            {
                name: '12 Bar Bruise',
                art: 'https://ibb.co/sJVwCRg',
                released: 'September 7, 2012',
                length: '34:18',
            },

            {
                name: 'Eyes Like the Sky',
                art: 'https://upload.cc/i1/2022/11/15/uP9hjM.jpg',
                released: 'February 22, 2013',
                length: '27:49',
            },

            {
                name: 'Quarters',
                art: 'https://upload.cc/i1/2022/11/15/afbUZV.jpg',
                released: 'May 1, 2015',
                length: '40:40',
            },

            {
                name: 'Nonagon Infinity',
                art: 'https://upload.cc/i1/2022/11/15/iLglSz.jpg',
                released: 'April 29, 2016',
                length: '41:45',
            },

            {
                name: 'Flying Microtonal Banana',
                art: 'https://upload.cc/i1/2022/11/15/3qZlfE.jpg',
                released: 'February 24, 2017',
                length: '41:53',
            },

            {
                name: 'Sketches of Brunswick East',
                art: 'https://upload.cc/i1/2022/11/15/2R4jiY.jpg',
                released: 'August 18, 2017',
                length: '37:19',
            },

            {
                name: 'Polygondwanaland',
                art: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/323064/polygondwanaland.jpg',
                released: 'November 17, 2017',
                length: '43:54',
            },

            {
                name: 'Gumboot Soup',
                art: 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/323064/gumboot-soup.jpg',
                released: 'December 31, 2017',
                length: '44:08',
            },
        ],
    };



  },
  methods: {
    openModal: function (e, album) {
      this.selected = album;

      let target = e.target,
      target_coords = target.getBoundingClientRect();

      // this.offsetTop = window.pageYOffset + 'px';
      this.modalOrigin = target.nodeName === 'IMG' ? target.offsetLeft + target_coords.width / 2 + 'px ' + (target.offsetTop + target_coords.height / 2) + 'px' : '0px 0px';
    } },

  mounted: function () {
    var listElement = document.querySelectorAll('.items-list__item');
    listElement.forEach(function (element) {
      setTimeout(function () {
        element.classList.add('js-animated');
      }, 0);
    });
  },
  template: `
		<div class="showcase">
			<h1 class="title">King Gizzard & The Lizard Wizard</h1>
			<small>click or tap to view album details.</small>
			<ol class="items-list fadein-stagger">
				<li class="items-list__item" v-for="album in albums">
					<img :src="album.art" :alt="album.name" @click="openModal($event, album)">
				</li>
			</ol>
			<transition name="modal-transition">
				<dialog ref="modal" v-if="selected" class="modal" @click="selected = false" :style="{ transformOrigin: modalOrigin }">
					<img :src="selected.art" :alt="selected.name">
					<span class="details"><b>Album Title</b>: {{ selected.name }}</span>
					<span class="details"><b>Release Date</b>: {{ selected.released }}</span>
					<span class="details"><b>Album Length</b>: {{ selected.length }}</span>
				</dialog>
			</transition>
		</div>
	` });
>>>>>>> bdd2e7eb82d211fc95a0d5ccb3edd3cc9b1d94f2
