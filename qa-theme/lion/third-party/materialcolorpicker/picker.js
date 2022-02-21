(function ($) {

    "use strict";

    function cell(col) {
        return '<td ' +
            (col ? ('class="cell ' + (col.contrast ? 'alt' : '') + '" style="background-color:' + col.hex + '" data-hex="' + col.hex + '" data-txt="' + (col.contrast ? '#000' : '#fff') + '">a') : '')
            + '</td>';
    }

    function getPalette(colors) {

        var colCount = colors.length,
            shadeCount = colors[0].shades.length;

        var out = '<div class="ui-colorpicker"><table class="palette">' +
            '<tr class="head">';

        for (var i = 0; i < colCount; i++) {
            out += cell(colors[i])
        }

        out += '</tr>' +
            '<tr class="sep">';

        for (var i = 0; i < colCount; i++) {
            out += cell()
        }

        out += '</tr>';

        for (var j = shadeCount - 5; j > 0; j--) {

            out += '<tr class="shade">';

            for (var i = 0; i < colCount; i++) {
                out += cell(colors[i].shades[j]);
            }

            out += '</tr>';
        }

        out += '</table></div>';

        return out;
    }

    var colors = [
            {
                "name": "red",
                "hex": "#f44336",
                "contrast": 0,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#ffebee",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#ffcdd2",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#ef9a9a",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#e57373",
                        "contrast": 1
                    },
                    {
                        "strength": 400,
                        "hex": "#ef5350",
                        "contrast": 1
                    },
                    {
                        "strength": 500,
                        "hex": "#f44336",
                        "contrast": 0
                    },
                    {
                        "strength": 600,
                        "hex": "#e53935",
                        "contrast": 0
                    },
                    {
                        "strength": 700,
                        "hex": "#d32f2f",
                        "contrast": 0
                    },
                    {
                        "strength": 800,
                        "hex": "#c62828",
                        "contrast": 0
                    },
                    {
                        "strength": 900,
                        "hex": "#b71c1c",
                        "contrast": 0
                    },
                    {
                        "strength": "A100",
                        "hex": "#ff8a80",
                        "contrast": 1
                    },
                    {
                        "strength": "A200",
                        "hex": "#ff5252",
                        "contrast": 0
                    },
                    {
                        "strength": "A400",
                        "hex": "#ff1744",
                        "contrast": 0
                    },
                    {
                        "strength": "A700",
                        "hex": "#d50000",
                        "contrast": 0
                    }]
            },
            {
                "name": "pink",
                "hex": "#e91e63",
                "contrast": 0,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#fce4ec",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#f8bbd0",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#f48fb1",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#f06292",
                        "contrast": 1
                    },
                    {
                        "strength": 400,
                        "hex": "#ec407a",
                        "contrast": 1
                    },
                    {
                        "strength": 500,
                        "hex": "#e91e63",
                        "contrast": 0
                    },
                    {
                        "strength": 600,
                        "hex": "#d81b60",
                        "contrast": 0
                    },
                    {
                        "strength": 700,
                        "hex": "#c2185b",
                        "contrast": 0
                    },
                    {
                        "strength": 800,
                        "hex": "#ad1457",
                        "contrast": 0
                    },
                    {
                        "strength": 900,
                        "hex": "#880e4f",
                        "contrast": 0
                    },
                    {
                        "strength": "A100",
                        "hex": "#ff80ab",
                        "contrast": 1
                    },
                    {
                        "strength": "A200",
                        "hex": "#ff4081",
                        "contrast": 0
                    },
                    {
                        "strength": "A400",
                        "hex": "#f50057",
                        "contrast": 0
                    },
                    {
                        "strength": "A700",
                        "hex": "#c51162",
                        "contrast": 0
                    }]
            },
            {
                "name": "purple",
                "hex": "#9c27b0",
                "contrast": 0,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#f3e5f5",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#e1bee7",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#ce93d8",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#ba68c8",
                        "contrast": 0
                    },
                    {
                        "strength": 400,
                        "hex": "#ab47bc",
                        "contrast": 0
                    },
                    {
                        "strength": 500,
                        "hex": "#9c27b0",
                        "contrast": 0
                    },
                    {
                        "strength": 600,
                        "hex": "#8e24aa",
                        "contrast": 0
                    },
                    {
                        "strength": 700,
                        "hex": "#7b1fa2",
                        "contrast": 0
                    },
                    {
                        "strength": 800,
                        "hex": "#6a1b9a",
                        "contrast": 0
                    },
                    {
                        "strength": 900,
                        "hex": "#4a148c",
                        "contrast": 0
                    },
                    {
                        "strength": "A100",
                        "hex": "#ea80fc",
                        "contrast": 1
                    },
                    {
                        "strength": "A200",
                        "hex": "#e040fb",
                        "contrast": 0
                    },
                    {
                        "strength": "A400",
                        "hex": "#d500f9",
                        "contrast": 0
                    },
                    {
                        "strength": "A700",
                        "hex": "#aa00ff",
                        "contrast": 0
                    }]
            },
            {
                "name": "deep purple",
                "hex": "#673ab7",
                "contrast": 0,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#ede7f6",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#d1c4e9",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#b39ddb",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#9575cd",
                        "contrast": 0
                    },
                    {
                        "strength": 400,
                        "hex": "#7e57c2",
                        "contrast": 0
                    },
                    {
                        "strength": 500,
                        "hex": "#673ab7",
                        "contrast": 0
                    },
                    {
                        "strength": 600,
                        "hex": "#5e35b1",
                        "contrast": 0
                    },
                    {
                        "strength": 700,
                        "hex": "#512da8",
                        "contrast": 0
                    },
                    {
                        "strength": 800,
                        "hex": "#4527a0",
                        "contrast": 0
                    },
                    {
                        "strength": 900,
                        "hex": "#311b92",
                        "contrast": 0
                    },
                    {
                        "strength": "A100",
                        "hex": "#b388ff",
                        "contrast": 1
                    },
                    {
                        "strength": "A200",
                        "hex": "#7c4dff",
                        "contrast": 0
                    },
                    {
                        "strength": "A400",
                        "hex": "#651fff",
                        "contrast": 0
                    },
                    {
                        "strength": "A700",
                        "hex": "#6200ea",
                        "contrast": 0
                    }]
            },
            {
                "name": "indigo",
                "hex": "#3f51b5",
                "contrast": 0,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#e8eaf6",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#c5cae9",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#9fa8da",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#7986cb",
                        "contrast": 0
                    },
                    {
                        "strength": 400,
                        "hex": "#5c6bc0",
                        "contrast": 0
                    },
                    {
                        "strength": 500,
                        "hex": "#3f51b5",
                        "contrast": 0
                    },
                    {
                        "strength": 600,
                        "hex": "#3949ab",
                        "contrast": 0
                    },
                    {
                        "strength": 700,
                        "hex": "#303f9f",
                        "contrast": 0
                    },
                    {
                        "strength": 800,
                        "hex": "#283593",
                        "contrast": 0
                    },
                    {
                        "strength": 900,
                        "hex": "#1a237e",
                        "contrast": 0
                    },
                    {
                        "strength": "A100",
                        "hex": "#8c9eff",
                        "contrast": 1
                    },
                    {
                        "strength": "A200",
                        "hex": "#536dfe",
                        "contrast": 0
                    },
                    {
                        "strength": "A400",
                        "hex": "#3d5afe",
                        "contrast": 0
                    },
                    {
                        "strength": "A700",
                        "hex": "#304ffe",
                        "contrast": 0
                    }]
            },
            {
                "name": "blue",
                "hex": "#2196f3",
                "contrast": 0,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#e3f2fd",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#bbdefb",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#90caf9",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#64b5f6",
                        "contrast": 1
                    },
                    {
                        "strength": 400,
                        "hex": "#42a5f5",
                        "contrast": 1
                    },
                    {
                        "strength": 500,
                        "hex": "#2196f3",
                        "contrast": 0
                    },
                    {
                        "strength": 600,
                        "hex": "#1e88e5",
                        "contrast": 0
                    },
                    {
                        "strength": 700,
                        "hex": "#1976d2",
                        "contrast": 0
                    },
                    {
                        "strength": 800,
                        "hex": "#1565c0",
                        "contrast": 0
                    },
                    {
                        "strength": 900,
                        "hex": "#0d47a1",
                        "contrast": 0
                    },
                    {
                        "strength": "A100",
                        "hex": "#82b1ff",
                        "contrast": 1
                    },
                    {
                        "strength": "A200",
                        "hex": "#448aff",
                        "contrast": 0
                    },
                    {
                        "strength": "A400",
                        "hex": "#2979ff",
                        "contrast": 0
                    },
                    {
                        "strength": "A700",
                        "hex": "#2962ff",
                        "contrast": 0
                    }]
            },
            {
                "name": "light blue",
                "hex": "#03a9f4",
                "contrast": 0,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#e1f5fe",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#b3e5fc",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#81d4fa",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#4fc3f7",
                        "contrast": 1
                    },
                    {
                        "strength": 400,
                        "hex": "#29b6f6",
                        "contrast": 1
                    },
                    {
                        "strength": 500,
                        "hex": "#03a9f4",
                        "contrast": 0
                    },
                    {
                        "strength": 600,
                        "hex": "#039be5",
                        "contrast": 0
                    },
                    {
                        "strength": 700,
                        "hex": "#0288d1",
                        "contrast": 0
                    },
                    {
                        "strength": 800,
                        "hex": "#0277bd",
                        "contrast": 0
                    },
                    {
                        "strength": 900,
                        "hex": "#01579b",
                        "contrast": 0
                    },
                    {
                        "strength": "A100",
                        "hex": "#80d8ff",
                        "contrast": 1
                    },
                    {
                        "strength": "A200",
                        "hex": "#40c4ff",
                        "contrast": 1
                    },
                    {
                        "strength": "A400",
                        "hex": "#00b0ff",
                        "contrast": 1
                    },
                    {
                        "strength": "A700",
                        "hex": "#0091ea",
                        "contrast": 0
                    }]
            },
            {
                "name": "cyan",
                "hex": "#00bcd4",
                "contrast": 0,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#e0f7fa",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#b2ebf2",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#80deea",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#4dd0e1",
                        "contrast": 1
                    },
                    {
                        "strength": 400,
                        "hex": "#26c6da",
                        "contrast": 1
                    },
                    {
                        "strength": 500,
                        "hex": "#00bcd4",
                        "contrast": 0
                    },
                    {
                        "strength": 600,
                        "hex": "#00acc1",
                        "contrast": 0
                    },
                    {
                        "strength": 700,
                        "hex": "#0097a7",
                        "contrast": 0
                    },
                    {
                        "strength": 800,
                        "hex": "#00838f",
                        "contrast": 0
                    },
                    {
                        "strength": 900,
                        "hex": "#006064",
                        "contrast": 0
                    },
                    {
                        "strength": "A100",
                        "hex": "#84ffff",
                        "contrast": 1
                    },
                    {
                        "strength": "A200",
                        "hex": "#18ffff",
                        "contrast": 1
                    },
                    {
                        "strength": "A400",
                        "hex": "#00e5ff",
                        "contrast": 1
                    },
                    {
                        "strength": "A700",
                        "hex": "#00b8d4",
                        "contrast": 1
                    }]
            },
            {
                "name": "teal",
                "hex": "#009688",
                "contrast": 0,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#e0f2f1",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#b2dfdb",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#80cbc4",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#4db6ac",
                        "contrast": 1
                    },
                    {
                        "strength": 400,
                        "hex": "#26a69a",
                        "contrast": 1
                    },
                    {
                        "strength": 500,
                        "hex": "#009688",
                        "contrast": 0
                    },
                    {
                        "strength": 600,
                        "hex": "#00897b",
                        "contrast": 0
                    },
                    {
                        "strength": 700,
                        "hex": "#00796b",
                        "contrast": 0
                    },
                    {
                        "strength": 800,
                        "hex": "#00695c",
                        "contrast": 0
                    },
                    {
                        "strength": 900,
                        "hex": "#004d40",
                        "contrast": 0
                    },
                    {
                        "strength": "A100",
                        "hex": "#a7ffeb",
                        "contrast": 1
                    },
                    {
                        "strength": "A200",
                        "hex": "#64ffda",
                        "contrast": 1
                    },
                    {
                        "strength": "A400",
                        "hex": "#1de9b6",
                        "contrast": 1
                    },
                    {
                        "strength": "A700",
                        "hex": "#00bfa5",
                        "contrast": 1
                    }]
            },
            {
                "name": "green",
                "hex": "#4caf50",
                "contrast": 0,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#e8f5e9",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#c8e6c9",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#a5d6a7",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#81c784",
                        "contrast": 1
                    },
                    {
                        "strength": 400,
                        "hex": "#66bb6a",
                        "contrast": 1
                    },
                    {
                        "strength": 500,
                        "hex": "#4caf50",
                        "contrast": 0
                    },
                    {
                        "strength": 600,
                        "hex": "#43a047",
                        "contrast": 0
                    },
                    {
                        "strength": 700,
                        "hex": "#388e3c",
                        "contrast": 0
                    },
                    {
                        "strength": 800,
                        "hex": "#2e7d32",
                        "contrast": 0
                    },
                    {
                        "strength": 900,
                        "hex": "#1b5e20",
                        "contrast": 0
                    },
                    {
                        "strength": "A100",
                        "hex": "#b9f6ca",
                        "contrast": 1
                    },
                    {
                        "strength": "A200",
                        "hex": "#69f0ae",
                        "contrast": 1
                    },
                    {
                        "strength": "A400",
                        "hex": "#00e676",
                        "contrast": 1
                    },
                    {
                        "strength": "A700",
                        "hex": "#00c853",
                        "contrast": 1
                    }]
            },
            {
                "name": "light green",
                "hex": "#8bc34a",
                "contrast": 1,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#f1f8e9",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#dcedc8",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#c5e1a5",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#aed581",
                        "contrast": 1
                    },
                    {
                        "strength": 400,
                        "hex": "#9ccc65",
                        "contrast": 1
                    },
                    {
                        "strength": 500,
                        "hex": "#8bc34a",
                        "contrast": 1
                    },
                    {
                        "strength": 600,
                        "hex": "#7cb342",
                        "contrast": 1
                    },
                    {
                        "strength": 700,
                        "hex": "#689f38",
                        "contrast": 1
                    },
                    {
                        "strength": 800,
                        "hex": "#558b2f",
                        "contrast": 0
                    },
                    {
                        "strength": 900,
                        "hex": "#33691e",
                        "contrast": 0
                    },
                    {
                        "strength": "A100",
                        "hex": "#ccff90",
                        "contrast": 1
                    },
                    {
                        "strength": "A200",
                        "hex": "#b2ff59",
                        "contrast": 1
                    },
                    {
                        "strength": "A400",
                        "hex": "#76ff03",
                        "contrast": 1
                    },
                    {
                        "strength": "A700",
                        "hex": "#64dd17",
                        "contrast": 1
                    }]
            },
            {
                "name": "lime",
                "hex": "#cddc39",
                "contrast": 1,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#f9fbe7",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#f0f4c3",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#e6ee9c",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#dce775",
                        "contrast": 1
                    },
                    {
                        "strength": 400,
                        "hex": "#d4e157",
                        "contrast": 1
                    },
                    {
                        "strength": 500,
                        "hex": "#cddc39",
                        "contrast": 1
                    },
                    {
                        "strength": 600,
                        "hex": "#c0ca33",
                        "contrast": 1
                    },
                    {
                        "strength": 700,
                        "hex": "#afb42b",
                        "contrast": 1
                    },
                    {
                        "strength": 800,
                        "hex": "#9e9d24",
                        "contrast": 1
                    },
                    {
                        "strength": 900,
                        "hex": "#827717",
                        "contrast": 0
                    },
                    {
                        "strength": "A100",
                        "hex": "#f4ff81",
                        "contrast": 1
                    },
                    {
                        "strength": "A200",
                        "hex": "#eeff41",
                        "contrast": 1
                    },
                    {
                        "strength": "A400",
                        "hex": "#c6ff00",
                        "contrast": 1
                    },
                    {
                        "strength": "A700",
                        "hex": "#aeea00",
                        "contrast": 1
                    }]
            },
            {
                "name": "yellow",
                "hex": "#ffeb3b",
                "contrast": 1,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#fffde7",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#fff9c4",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#fff59d",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#fff176",
                        "contrast": 1
                    },
                    {
                        "strength": 400,
                        "hex": "#ffee58",
                        "contrast": 1
                    },
                    {
                        "strength": 500,
                        "hex": "#ffeb3b",
                        "contrast": 1
                    },
                    {
                        "strength": 600,
                        "hex": "#fdd835",
                        "contrast": 1
                    },
                    {
                        "strength": 700,
                        "hex": "#fbc02d",
                        "contrast": 1
                    },
                    {
                        "strength": 800,
                        "hex": "#f9a825",
                        "contrast": 1
                    },
                    {
                        "strength": 900,
                        "hex": "#f57f17",
                        "contrast": 1
                    },
                    {
                        "strength": "A100",
                        "hex": "#ffff8d",
                        "contrast": 1
                    },
                    {
                        "strength": "A200",
                        "hex": "#ffff00",
                        "contrast": 1
                    },
                    {
                        "strength": "A400",
                        "hex": "#ffea00",
                        "contrast": 1
                    },
                    {
                        "strength": "A700",
                        "hex": "#ffd600",
                        "contrast": 1
                    }]
            },
            {
                "name": "amber",
                "hex": "#ffc107",
                "contrast": 1,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#fff8e1",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#ffecb3",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#ffe082",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#ffd54f",
                        "contrast": 1
                    },
                    {
                        "strength": 400,
                        "hex": "#ffca28",
                        "contrast": 1
                    },
                    {
                        "strength": 500,
                        "hex": "#ffc107",
                        "contrast": 1
                    },
                    {
                        "strength": 600,
                        "hex": "#ffb300",
                        "contrast": 1
                    },
                    {
                        "strength": 700,
                        "hex": "#ffa000",
                        "contrast": 1
                    },
                    {
                        "strength": 800,
                        "hex": "#ff8f00",
                        "contrast": 1
                    },
                    {
                        "strength": 900,
                        "hex": "#ff6f00",
                        "contrast": 1
                    },
                    {
                        "strength": "A100",
                        "hex": "#ffe57f",
                        "contrast": 1
                    },
                    {
                        "strength": "A200",
                        "hex": "#ffd740",
                        "contrast": 1
                    },
                    {
                        "strength": "A400",
                        "hex": "#ffc400",
                        "contrast": 1
                    },
                    {
                        "strength": "A700",
                        "hex": "#ffab00",
                        "contrast": 1
                    }]
            },
            {
                "name": "orange",
                "hex": "#ff9800",
                "contrast": 1,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#fff3e0",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#ffe0b2",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#ffcc80",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#ffb74d",
                        "contrast": 1
                    },
                    {
                        "strength": 400,
                        "hex": "#ffa726",
                        "contrast": 1
                    },
                    {
                        "strength": 500,
                        "hex": "#ff9800",
                        "contrast": 1
                    },
                    {
                        "strength": 600,
                        "hex": "#fb8c00",
                        "contrast": 1
                    },
                    {
                        "strength": 700,
                        "hex": "#f57c00",
                        "contrast": 1
                    },
                    {
                        "strength": 800,
                        "hex": "#ef6c00",
                        "contrast": 0
                    },
                    {
                        "strength": 900,
                        "hex": "#e65100",
                        "contrast": 0
                    },
                    {
                        "strength": "A100",
                        "hex": "#ffd180",
                        "contrast": 1
                    },
                    {
                        "strength": "A200",
                        "hex": "#ffab40",
                        "contrast": 1
                    },
                    {
                        "strength": "A400",
                        "hex": "#ff9100",
                        "contrast": 1
                    },
                    {
                        "strength": "A700",
                        "hex": "#ff6d00",
                        "contrast": 1
                    }]
            },
            {
                "name": "deep orange",
                "hex": "#ff5722",
                "contrast": 0,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#fbe9e7",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#ffccbc",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#ffab91",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#ff8a65",
                        "contrast": 1
                    },
                    {
                        "strength": 400,
                        "hex": "#ff7043",
                        "contrast": 1
                    },
                    {
                        "strength": 500,
                        "hex": "#ff5722",
                        "contrast": 0
                    },
                    {
                        "strength": 600,
                        "hex": "#f4511e",
                        "contrast": 0
                    },
                    {
                        "strength": 700,
                        "hex": "#e64a19",
                        "contrast": 0
                    },
                    {
                        "strength": 800,
                        "hex": "#d84315",
                        "contrast": 0
                    },
                    {
                        "strength": 900,
                        "hex": "#bf360c",
                        "contrast": 0
                    },
                    {
                        "strength": "A100",
                        "hex": "#ff9e80",
                        "contrast": 1
                    },
                    {
                        "strength": "A200",
                        "hex": "#ff6e40",
                        "contrast": 1
                    },
                    {
                        "strength": "A400",
                        "hex": "#ff3d00",
                        "contrast": 0
                    },
                    {
                        "strength": "A700",
                        "hex": "#dd2c00",
                        "contrast": 0
                    }]
            },
            {
                "name": "brown",
                "hex": "#795548",
                "contrast": 0,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#efebe9",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#d7ccc8",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#bcaaa4",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#a1887f",
                        "contrast": 0
                    },
                    {
                        "strength": 400,
                        "hex": "#8d6e63",
                        "contrast": 0
                    },
                    {
                        "strength": 500,
                        "hex": "#795548",
                        "contrast": 0
                    },
                    {
                        "strength": 600,
                        "hex": "#6d4c41",
                        "contrast": 0
                    },
                    {
                        "strength": 700,
                        "hex": "#5d4037",
                        "contrast": 0
                    },
                    {
                        "strength": 800,
                        "hex": "#4e342e",
                        "contrast": 0
                    },
                    {
                        "strength": 900,
                        "hex": "#3e2723",
                        "contrast": 0
                    }]
            },
            {
                "name": "grey",
                "hex": "#9e9e9e",
                "contrast": 1,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#fafafa",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#f5f5f5",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#eeeeee",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#e0e0e0",
                        "contrast": 1
                    },
                    {
                        "strength": 400,
                        "hex": "#bdbdbd",
                        "contrast": 1
                    },
                    {
                        "strength": 500,
                        "hex": "#9e9e9e",
                        "contrast": 1
                    },
                    {
                        "strength": 600,
                        "hex": "#757575",
                        "contrast": 0
                    },
                    {
                        "strength": 700,
                        "hex": "#616161",
                        "contrast": 0
                    },
                    {
                        "strength": 800,
                        "hex": "#424242",
                        "contrast": 0
                    },
                    {
                        "strength": 900,
                        "hex": "#212121",
                        "contrast": 0
                    }]
            },
            {
                "name": "blue grey",
                "hex": "#607d8b",
                "contrast": 0,
                "shades": [
                    {
                        "strength": 50,
                        "hex": "#eceff1",
                        "contrast": 1
                    },
                    {
                        "strength": 100,
                        "hex": "#cfd8dc",
                        "contrast": 1
                    },
                    {
                        "strength": 200,
                        "hex": "#b0bec5",
                        "contrast": 1
                    },
                    {
                        "strength": 300,
                        "hex": "#90a4ae",
                        "contrast": 1
                    },
                    {
                        "strength": 400,
                        "hex": "#78909c",
                        "contrast": 0
                    },
                    {
                        "strength": 500,
                        "hex": "#607d8b",
                        "contrast": 0
                    },
                    {
                        "strength": 600,
                        "hex": "#546e7a",
                        "contrast": 0
                    },
                    {
                        "strength": 700,
                        "hex": "#455a64",
                        "contrast": 0
                    },
                    {
                        "strength": 800,
                        "hex": "#37474f",
                        "contrast": 0
                    },
                    {
                        "strength": 900,
                        "hex": "#263238",
                        "contrast": 0
                    }]
            }],
        defaultOpt = {
            preview: true,
            setValue: function (col, txt) {
            }
        };

    $.fn.colorPicker = function (opt) {

        opt = $.extend({}, opt, defaultOpt);

        $.each(this, function () {

            var palette = $(getPalette(colors))
                    .on('click', '.cell', function (e) {

                        var $cell = $(this),
                            col = $cell.data('hex'),
                            txt = $cell.data('txt');

                        $this.val(col);

                        opt.setValue(col, txt);

                        if (opt.preview) {
                            $this.css({
                                backgroundColor: col,
                                color: txt
                            });
                        }

                    }),
                $this = $(this)
                    .on('focusin', function () {

                        var pos = $this.position(),
                            pw = palette.appendTo('body').width(),
                            sw = $(window).width(),
                            overflow = pos.left + pw > sw;

                        palette.css({
                            left: overflow ? '' : pos.left,
                            right: overflow ? 0 : '',
                            top: pos.top + $this.outerHeight()
                        }).fadeIn();
                    })
                    .on('focusout', function () {
                        palette.fadeOut();
                    })
                    .on('remove', function () {
                        palette.remove();
                    });

        });

    };

})(jQuery);