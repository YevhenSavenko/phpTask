    function makeRequest() {
        let httpRequest = false;

        if (window.XMLHttpRequest) {
            // Mozilla, Safari, ...
            httpRequest = new XMLHttpRequest();
            if (httpRequest.overrideMimeType) {
                httpRequest.overrideMimeType("text/xml");
            }
        } else if (window.ActiveXObject) {
            // IE
            try {
                httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try {
                    httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {}
            }
        }

        if (!httpRequest) {
            alert("Не вышло :( Невозможно создать экземпляр класса XMLHTTP ");
            return false;
        }
        httpRequest.onreadystatechange = function () {
            giveContents(httpRequest);
        };

        httpRequest.open('GET', '/index.php?action=getjson', true);
        httpRequest.send(null);
    }


    function giveContents(httpRequest) {
        if (httpRequest.readyState === 4) {
            if (httpRequest.status === 200) {
                let parse = JSON.parse(httpRequest.response);
                createChars(parse);
            } else {
                alert("С запросом возникла проблема.");
            }
        }
    }

    function createChars(parse){
        let ctx = document.querySelectorAll('.charts');
        ctx.forEach(item => item.getContext('2d'));

        for(let i = 0; i < parse.length; i++) {
            let arrayYear = [];
            let arrayQuantity = [];
            let arrayBackground = [];

            for(let j = 0; j < parse[i].length; j++){
                arrayYear.push(parse[i][j].year);
                arrayQuantity.push(parse[i][j].quantity);
                arrayBackground.push(`rgb(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)})`)
            }


            let chart = new Chart(ctx[i], {
            type: 'doughnut',
            data: {
                labels: arrayYear,
                datasets: [{
                    label: 'Dataset',
                    backgroundColor: arrayBackground,
                    borderColor: 'rgb(255,255,255)',
                    data: arrayQuantity,
                }]
            },
            options: {}
            });
        }
    }