const tankColors = [
    'green',
    'blue',
    'red'
]

class Tank extends Phaser.Physics.Arcade.Sprite {
    constructor(scene, x, y, color) {
        super(scene, x, y, 'kenney', 'tankBody_' + color);

        scene.physics.world.enableBody(this);
        this.body.setAllowGravity(false);
        scene.add.existing(this);

        this.setOrigin(0.5, 0.5);
        this.setSize(38, 38);
        this.setCollideWorldBounds(true);
    }
}

class KeyboardMouseTank extends Tank {
    constructor(scene, x, y) {
        super(scene, x, y, 'green');
    }
}

class GamepadTank extends Tank {
    constructor(scene, x, y, pad) {
        super(scene, x, y, 'red');
        this.pad = pad;
    }
}