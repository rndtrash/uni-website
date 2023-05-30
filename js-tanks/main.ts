
window.addEventListener('load', function () {

	var game = new Phaser.Game({
		width: 640,
		height: 480,
		type: Phaser.AUTO,
		backgroundColor: "#242424",
		scale: {
			mode: Phaser.Scale.FIT,
			autoCenter: Phaser.Scale.CENTER_BOTH
		},
		physics: {
			default: "arcade",
			arcade: {
				gravity: { x: 0, y: 0 },
				debug: true
			},
		},
		pixelArt: true,
	});

	game.scene.add("Level", Level);
	game.scene.add("Boot", Boot, true);
});

class Boot extends Phaser.Scene {

	preload() {

		this.load.pack("pack", "assets/preload-asset-pack.json");
	}

	create() {

		this.scene.start("Level");
	}

}