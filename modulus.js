#!/usr/bin/env node

const fs = require('fs');
const args = process.argv;

if (args[2] == 'make:controller') {
    var modelNamecontrollerName;
    args[3].endsWith('Controller') ? controllerName = args[3] : controllerName = args[3] + 'Controller';

    fs.open('app/Controllers/' + controllerName + '.php', 'wx', (err, fd) => {
        if (err) {
            if (err.code === 'EEXIST') {
                console.error('Controller already exists');
                return;
            }

            throw err;
        }

        fs.writeFile('app/Controllers/' + controllerName + '.php', '<?php\n\nclass ' + controllerName + ' extends Controller\n{\n    /**\n     * This is the default method\n     *\n    */\n    public function index($view = null)\n    {\n        echo "' + controllerName + ' was successfully created!";\n    }\n}', (err) => {
            if (err) throw err;
            console.log(controllerName + ' was successfully created!');
        });
    });
}
else if (args[2] == 'make:model') {
    var modelName = args[3];
    fs.open('app/Models/' + modelName + '.php', 'wx', (err, fd) => {
        if (err) {
            if (err.code === 'EEXIST') {
                console.error('Model already exists');
                return;
            }

            throw err;
        }

        fs.writeFile('app/Models/' + modelName + '.php', '<?php\n\nuse Illuminate\\Database\\Eloquent\\Model as Eloquent;\n\nclass ' + modelName + ' extends Eloquent\n{\n    \n}', (err) => {
            if (err) throw err;
            console.log(modelName + ' was successfully created!');
        });
    });
}
else if (args[2] == 'make:view') {
    var view = args[3];
    fs.open('resources/views/' + view + '.modulus.php', 'wx', (err, fd) => {
        if (err) {
            if (err.code === 'EEXIST') {
                console.error('View already exists');
                return;
            }

            throw err;
        }

        fs.writeFile('resources/views/' + view + '.modulus.php', '', (err) => {
            if (err) throw err;
            console.log(view + ' was successfully created!');
        });
    });
}
else if (args[2] == 'list:Models') {
    const modelsFolder = 'app/Models';

    fs.readdir(modelsFolder, (err, files) => {
        files.forEach(file => {
            if (file.endsWith('.php')) {
                console.log(file.replace('.php', ''));
            }
        });
    })
}
else if (args[2] == 'list:Controllers') {
    const controllersFolder = 'app/Controllers';

    fs.readdir(controllersFolder, (err, files) => {
        files.forEach(file => {
            if (file.endsWith('Controller.php')) {
                console.log(file.replace('.php', ''));
            }
        });
    })
}