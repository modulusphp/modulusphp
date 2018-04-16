(function () {
    
    // sesha Info

    var sesha = {
        get Name() {
            return "seshaUI";
        },
        get Version() {
            return 0.4;
        },
        get License() {
            return "MIT";
        },
        get Language() {
            return "C Modulus";
        },
        get Framework() {
            return "subatomicJS, preciseJS";
        },
        get Author() {
            return "Donald Pakkies";
        },
        get Maintainer() {
            return "Donald Pakkies";
        },
        get Date() {
            return "Jun 18, 2017, 10:56 AM";
        }
    };

    //
    
    // Main

    var system = {
        name : "system",
        text : "",
        event : "",
        print : function (text) {
            if (text == null) {
                console.log("");
            }
            else {
                text = text.toString();
                if (!text.endsWith(".include();") || !text.endsWith(".Include();") || !text.startsWith("string.Include(")) {
                    try {
                        text = text.include();
                    }
                    catch (exception) {}
                }
                return console.log(text);
            }
        }
    };
    
    function def(what, where) {
        var action  = what.Between(':', '');
        var element = what.replace(string.Format('::{0}', action), '');
        
        if (action == 'onclick') {
            if (where.endsWith(')') || where.endsWith(');')) {
                document.getElementById(element).setAttribute(action, where);
            }
            else if (!where.endsWith(');')) {
                document.getElementById(element).setAttribute(action, where + '();');
            }
        }
        else {
            document.getElementById(element).setAttribute(action, where);
        }
    }

    function seshaUI() {
        if ((typeof seshaUI.instance == "object")) {
            return seshaUI.instance;
        }
        
        this._icon = false;
        
        this.require = function (url) {
            try {
                var head = document.getElementsByTagName("head")[0];
                var script = document.createElement("script");
                if (url.endsWith(".cmod")) {
                    script.src = url.replace(".cmod", ".js");
                }
                else if (!(url.includes('.js') || url.includes('.cmod'))) {
                    script.src = url + '.js';
                }
                else {
                    script.src = url;
                }
                script.type = "text/javascript";
                head.appendChild(script);
                return true;
            }
            catch (exception) {
                return false;
            }
        }
        
        this.name  = "SeshaUI";
        
        this.add = function (code) {
            code = code.toString();
            if (!code.endsWith("br>")) {
                return document.write(code + "<br>");
            }
            else {
                return document.write(code);
            }
        }

        this.addElement = function (code) {
            var mainView = document.getElementById("ViewController");
            return mainView.insertAdjacentHTML('beforeend', code);
        }
        
        this.AddTo = function (elementID, code) {
            var docElement = document.getElementById(elementID);
            return docElement.insertAdjacentHTML('beforeend', code);
        }
        
        this.ViewController = function (code) {
            var temp = code;
            var docElement = document.getElementById("ViewController");
            return docElement.insertAdjacentHTML('beforeend', code);
        }
        
        this.Menu = function (code) {
            mainMenu.show(code);
        }
        
        this.request = function (id) {
            if (id != null) {
                return document.getElementById(id);
            }
            else {
                console.error('Can\'t find element');
            }
        }
        
        this.select = function () {
            var selector = arguments[0];
            var item     = arguments[0].substr(1);
            var num      = arguments[1];
            if (selector.startsWith("#")) {
                return document.getElementById(item);
            }
            else if (selector.startsWith(".")) {
                return document.getElementsByClassName(item);
            }
            else {
                return document.getElementsByName(selector);
            }
        }
        
        this.getElementID = function (elementID) {
            var docElement = document.getElementById(elementID);
            return docElement;
        }
        
        this.getElementName = function (elementName) {
            var docElement = document.getElementByName(elementName);
            return docElement;
        }
        
        seshaUI.instance = this;
        return this;
    }
    
    //

    // Getters and Setters

    //Title
    Object.__defineGetter__.call(seshaUI.prototype, "title", function () {
        return document.title;
    });

    Object.__defineSetter__.call(seshaUI.prototype, "title", function (text) {
        return document.title = text;
    });
    
    Object.__defineSetter__.call(seshaUI.prototype, "icon", function (path) {
        if (this._icon == false) { 
            var head = document.getElementsByTagName("head")[0];
            var link = document.createElement("link");
            link.rel  = "shortcut icon";
            link.href = path;
            link.type = "image/x-icon";
            head.appendChild(link);
            this._icon = true;
        }
        else {
            var links = document.getElementsByTagName('link');
            
            for (var i = 0; i < links.length; i++) {
                if (links[i].rel == "shortcut icon") {
                    links[i].href = path;
                }
            }
        }
    });

    //
    
    // Prototypes and more
    
    var int = {
        
        Parse : function () {
            var text = new String( arguments[0]);
            return Number(text);
        }
        
    }
    
    var string = {
        
        Format : function () {
            
            var text = new String( arguments[0]);

            for (var i = 0; i < arguments.length; i++) {
                arguments[i] = arguments[i+1];
            }

            for (var i = 0; i < arguments.length; i++) {
                if (arguments[i] != "undifined") {
                    text = text.replace("{" + i + "}", arguments[i]);
                }
            }
            
            return text;
        },
        Include : function () {
            var text = new String( arguments[0]);
            
            var results = text.match(/{(.*?)\}/g).map(function (val) {
                var newVal = val.Between("{", "}");
                text       = text.replace(val, eval(newVal));
            });
                
            return text;
        }
    }
    
    String.prototype.format = function () {
        var text = new String( this);
        
        for (var i = 0; i < arguments.length; i++) {
            text = text.replace("{" + i + "}", arguments[i]);
        }
        
        return text;
    }

    String.prototype.Format = function () {
        var text = new String( this);
        
        for (var i = 0; i < arguments.length; i++) {
            text = text.replace("{" + i + "}", arguments[i]);
        }
        
        return text;
    }

    String.prototype.include = function () {
        var text = new String( this);
        var results = text.match(/{(.*?)\}/g).map(function (val) {
            var newVal = val.ReplaceAll("{", "");
            newVal     = newVal.ReplaceAll("}", "");
            text       = text.replace(val, "" + eval(newVal) + "");
        });
        return text;
    }

    String.prototype.Include = function () {
        var text = new String( this);
        var results = text.match(/{(.*?)\}/g).map(function (val) {
            var newVal = val.Between("{", "}");
            text       = text.replace(val, eval(newVal));
        });
        return text;
    }

    String.prototype.Parse = function () {
        var text = new String( this);
        return Number(text);
    }
    
    String.prototype.parse = function () {
        var text = new String( this);
        return Number(text);
    }
    
    String.prototype.Between = function (char1, char2) {
        var text = new String( this);
        return text.substring(text.lastIndexOf(char1) + 1, text.lastIndexOf(char2));
    }

    String.prototype.ReplaceAll = function (search, replacement) {
        var text = new String( this);
        return text.split(search).join(replacement);
    };

    String.prototype.ToString = function () {
        return this.toString();
    }
    
    String.prototype.toInt = function () {
        return Number(this);
    }
    
    String.prototype.ToInt = function () {
        return Number(this);
    }

    Array.prototype.Contains = function(elem) {
        for (var i in this) {
            if (this[i] == elem) {
                return true;
            }
        }
        return false;
    }
    
    Number.prototype.ToString = function () {
        return this.toString();
    }

    Boolean.prototype.ToString = function () {
        return this.toString();
    }

    Function.prototype.ToString = function () {
        return this.toString();
    }

    Function.prototype.Code = function (args) {
        if (args == null || "") {
            args = 2;
        }
        var code = this.toString();
        return code.slice(15, -args);
    };
    
    //
    
    window.sesha   = sesha;
    window.seshaUI = seshaUI;
    
    window.system = system;
    window.def    = def;
    window.string = string;
    window.int    = int;
    
})();