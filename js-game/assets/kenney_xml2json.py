#!/usr/bin/env python3

import xml.etree.ElementTree as ET
import json
from pathlib import Path

atlas = {"frames": []}

atlas_xml = ET.parse("kenney.xml")
for subtexture in atlas_xml.findall("//SubTexture"):
    frame = {
        "filename": Path(subtexture.attrib["name"]).stem,
        "frame": {
            "x": int(subtexture.attrib["x"]),
            "y": int(subtexture.attrib["y"]),
            "w": int(subtexture.attrib["width"]),
            "h": int(subtexture.attrib["height"]),
        },
        "rotated": False,
        "trimmed": False,
        "spriteSourceSize": {
            "x": 0,
            "y": 0,
            "w": int(subtexture.attrib["width"]),
            "h": int(subtexture.attrib["height"]),
        },
        "sourceSize": {
            "w": int(subtexture.attrib["width"]),
            "h": int(subtexture.attrib["height"]),
        },
        "pivot": {
            "x": 0.5,
            "y": 0.5,
        }
    }
    atlas["frames"].append(frame)

with open("kenney.json", "w") as f:
    f.write(json.dumps(atlas))
