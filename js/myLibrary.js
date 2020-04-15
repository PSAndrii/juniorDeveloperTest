function OurGetXMLHttp() {  
    var MyXMLFile;
        if (window.XMLHttpRequest) {    
            MyXMLFile = new XMLHttpRequest()
        }
        else { 
            MyXMLFile = new ActiveXObject("Microsoft.XMLHTTP") 
        }
        return MyXMLFile
    }
    function isXMLOk(MyXML) {
        return MyXML.readyState == 4 && MyXML.status == 200
    }
    function AJAX_Swiched(ElementId, value) {
        MyXMLFile = OurGetXMLHttp(); 
        MyXMLFile.onreadystatechange = function() {
            if (isXMLOk(MyXMLFile)) 
                with (document.getElementById(ElementId))
                    innerHTML=MyXMLFile.responseText
        };
        MyXMLFile.open("GET", "Classes/swich/dynamicalCreationBlock.php?swich="+value, true);
        MyXMLFile.send()
    }