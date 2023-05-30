"use strict";
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
class Level extends Phaser.Scene {
    groupWalls = null;
    constructor() {
        super("Level");
    }
    preload() {
        this.load.pack("level", "assets/asset-pack.json");
    }
    create() {
        const map = this.make.tilemap({ key: 'ffa' });
        const tileset = map.addTilesetImage('Battle City', 'battle-city-png');
        if (tileset == null) {
            throw "Failed to load the battle city tileset";
        }
        // Коллизия со всеми тайлами карты
        const platforms = map.createLayer('Map', tileset);
        if (platforms == null) {
            throw "Epic layer creation fail";
        }
        platforms.setCollisionByExclusion([], true);
        // Отсутствие коллизии с кустами
        const bushes = map.createLayer('Bushes', tileset);
        if (bushes == null) {
            throw "Epic bush fail";
        }
        bushes.setCollisionByExclusion([], false);
        // Стены являются игровыми объектами
        this.groupWalls = this.physics.add.group({
            allowGravity: false,
            immovable: true
        });
        map.getObjectLayer("Walls")?.objects.forEach(wall => {
            const wallSprite = this.groupWalls?.create(wall.x, wall.y, 'wall').setOrigin(0, 1);
        });
        // TODO: бонусы
        map.getObjectLayer("Bonuses")?.objects.forEach(bonus => {
            console.log(bonus);
        });
        // TODO: точки спауна
        map.getObjectLayer("Spawns")?.objects.forEach(spawn => {
            console.log(spawn);
        });
    }
}
