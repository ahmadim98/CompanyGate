// API Url
const ApiURL = 
      "https://jsonplaceholder.typicode.com/users";
  
// Defining async function
let numberOfPagesSet = false;

async function callPosts(url) {
    
    // Storing response
    const response = await fetch(url);
    
    // Storing data in form of JSON
    var data = await response.json();

    let finaldata = [];

    for(var i = 0;i < data.length;i++){
        finaldata.push(data[i]);
    }

    show(finaldata);
}

function show(data) {
    // Loop to access all rows 
    for(var i = 0;i < data.length;i++) {
        /*let news_row = `
        <div class="list-group-item">
            <div class="row align-items-center">
            <div class="col-auto">
                <span class="circle circle-sm bg-primary"><i class="fe fe-radio fe-16 text-white"></i></span>
            </div>
            <div class="col">
                <h4><a href="#"><strong>`+data[i].title+`</strong></a></h4>
                <div class="mb-2 text-muted small">`+data[i].body+`</div>
                <small><strong>17:00 April 10, 2020</strong></small>
            </div>
            </div> <!-- / .row -->
        </div><!-- / .list-group-item -->
        `  

        $("#news_space").append(news_row);*/
    }
   
}

jQuery(document).ready(function($){ //wait for the document to load
    // Calling that async function
    callPosts(ApiURL);
});