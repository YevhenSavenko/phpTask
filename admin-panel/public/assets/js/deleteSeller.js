// let btn = document.querySelector('#btn');


// btn.addEventListener('click',() => {
//     makeRequest();
// });

// function makeRequest() {
//   let httpRequest = false;

//   if (window.XMLHttpRequest) {
//       // Mozilla, Safari, ...
//       httpRequest = new XMLHttpRequest();
//       if (httpRequest.overrideMimeType) {
//           httpRequest.overrideMimeType("text/xml");
//       }
//   } else if (window.ActiveXObject) {
//       // IE
//       try {
//           httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
//       } catch (e) {
//           try {
//               httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
//           } catch (e) {}
//       }
//   }

//   if (!httpRequest) {
//       alert("Не вышло :( Невозможно создать экземпляр класса XMLHTTP ");
//       return false;
//   }
//   httpRequest.onreadystatechange = function () {
//       giveContents(httpRequest);
//   };

//   httpRequest.open('POST', 'http://localhost:8080/index/delete?id=2', true);
//   httpRequest.send(null);
// }


// function giveContents(httpRequest) {
//   if (httpRequest.readyState === 4) {
//       if (httpRequest.status === 200) {
//         //   let parse = JSON.parse(httpRequest.response);
//           console.log(httpRequest);
//       } else {
//           alert("С запросом возникла проблема.");
//       }
//   }
// }  

document.addEventListener("DOMContentLoaded",function() {
    let btn = document.querySelector('#btn')
    
    if(btn){
    btn.addEventListener("click", function(){
      let id = document.querySelector('.id').innerText;
      id = 'id=' + encodeURIComponent(id);
      let request = new XMLHttpRequest();
      request.open('POST','http://localhost:8080/index/delete',true);
      
      request.addEventListener('readystatechange', function() {
        
        if ((request.readyState==4) && (request.status==200)) {
          answer = JSON.parse(request.response);
          
          const code = document.querySelector('.code');
          const message = document.querySelector('.message');

          code.innerText = answer.code;
          message.innerText = answer.message;

          if(answer.code === 200){
              const content = document.querySelector('.content_info');
              const notification = document.querySelector('.notification');

              notification.classList.add('alert', 'alert-success');
              notification.classList.remove('notification__none');
              content.style.display = 'none';
          }
        }
      });
      request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')
      request.send(id);
    });
    }
});