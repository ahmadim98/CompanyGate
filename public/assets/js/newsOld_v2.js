let currentNumberOfRows = parseInt($('#inlineFormCustomSelectPref1 option').filter(':selected').text());
let currentPage = parseInt($(".page-item.active").children('a').text());

// API Url
const ApiURL = 
      "https://jsonplaceholder.typicode.com/posts";
  
// Defining async function

let tabsLoaded = false;
async function callPosts(url,from,to,pagenumber) {
    
    // Storing response
    const response = await fetch(url);
    
    // Storing data in form of JSON
    var data = await response.json();

    let number_of_news = to - from;

    let finaldata = [];

    if(data.length < number_of_news){
        number_of_news = data.length;
    }else {
        number_of_news = to;
    }

    let limit = currentNumberOfRows;

    if(pagenumber > 1){
        limit = from;
        from = 0;
    }

    for(var i = from;i < number_of_news;i++){
        if(pagenumber > 1){
            if(i >= limit){
                finaldata.push(data[i]);
            }
        }else {
            finaldata.push(data[i]);
        }
    }

    setNumberOfPages(data.length,pagenumber);
    show(finaldata);

    console.log("Under callposts where tabloaded is = "+tabsLoaded);
    if(!tabsLoaded){
        console.log("inside tabs loaded");
        preparePagesHook();
        tabsLoaded = true;
    }
}

// Calling that async function
callPosts(ApiURL,0,10,1);
//setNumberOfPages(100,1);

function setNumberOfPages(lengthOfData,pagenumber) {
    $('#pagesList').empty();

    //currentNumberOfRows = parseInt($('#inlineFormCustomSelectPref1 option').filter(':selected').text());
    let lastPage = 0;

    if(lengthOfData < currentNumberOfRows){
        lastPage = currentNumberOfRows;
    }else {
        lastPage = Math.ceil(lengthOfData/currentNumberOfRows);
    }

    for(var i = 1;i < lastPage;i++){
        if(i == pagenumber){
            $( "#pagesList" ).append( "<li class='page-item active'><a class='page-link' href='#"+i+"'>"+i+"</a></li> ");
        }else {
            $( "#pagesList" ).append( "<li class='page-item'><a class='page-link' href='#"+i+"'>"+i+"</a></li> ");
        }
    }
}

function show(data) {
    // Loop to access all rows 
    for(var i = 0;i < data.length;i++) {
        let news_row = `
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

        $("#news_space").append(news_row);
    }
   
}

function flushPosts(from,to,pagenumber){
    $("#news_space").empty();
    callPosts(ApiURL,from,to,pagenumber);
}

function preparePagesHook(){
    $( ".page-link" ).click(function() {
    
        let value = $(this).attr('href').substring(1);
    
        //first we get which page we are on
        let currentPageNumber = parseInt($(".page-item.active").children('a').text());
    
        let newCurrentNumberOfRows = 0;
    
        //third we get the total number of pages
        let totalPages = parseInt(document.querySelectorAll('#pagesList li').length);
    
        //third we update the number of rows in case the number has changed
        currentNumberOfRows = parseInt($('#inlineFormCustomSelectPref1 option').filter(':selected').text());
    
        //console.log(totalPages);
        //second we move the option to the one which was choosen 
        if(value === 'next' || value === 'previous'){
            if(value === 'previous' && currentPageNumber == 1){
    
            }else if(value === 'next' && currentPageNumber >= totalPages){
    
            }else {
                if(value === 'next'){
                    /*$('#pagesList').children('li').each(function () {
                        let pageNumber = parseInt($(this).children('a').text()); // "this" is the current element in the loop
                        if(pageNumber == currentPageNumber){
                            $(this).removeClass('active');
                            $(this).next().addClass('active');

                            console.log("Here at next the current page is = "+pageNumber);
                        }
                    });
    
                    newPageNumber = currentPageNumber+1;
                    newCurrentNumberOfRows = currentNumberOfRows * currentPageNumber;
    
                    let toPosts = currentNumberOfRows * newPageNumber;*/
                    $(".page-item.active").next().addClass('active');
                    $(".page-item.active").removeClass('active');
                    
                    newPageNumber = currentPageNumber+1;
                    newCurrentNumberOfRows = currentNumberOfRows * currentPageNumber;
    
                    let toPosts = currentNumberOfRows * newPageNumber;

                    tabsLoaded = false;

                    flushPosts(newCurrentNumberOfRows,toPosts,newPageNumber);
                }else {
                    /*$('#pagesList').children('li').each(function () {
                        let pageNumber = parseInt($(this).children('a').text()); // "this" is the current element in the loop
                        if(pageNumber == currentPageNumber){
                            $(this).removeClass('active');
                            $(this).prev().addClass('active');
                        }
                    });
    
                    newPageNumber = currentPageNumber-1;
                    newCurrentNumberOfRows = currentNumberOfRows * (currentPageNumber-2);
    
                    let toPosts = currentNumberOfRows * newPageNumber;
    
                    if(newPageNumber == 1){
                        newCurrentNumberOfRows = 0;
                    }*/
                    
                    $(".page-item.active").prev().addClass('active');
                    $(".page-item.active").removeClass('active');
                    
                    newPageNumber = currentPageNumber-1;
                    newCurrentNumberOfRows = currentNumberOfRows * (currentPageNumber-2);
    
                    let toPosts = currentNumberOfRows * newPageNumber;
    
                    if(newPageNumber == 1){
                        newCurrentNumberOfRows = 0;
                    }

                    tabsLoaded = false;
    
                    flushPosts(newCurrentNumberOfRows,toPosts,newPageNumber);
                }
            }
        }else {
            //fix problem with choosing page two ahead of the current page
            $(".page-item.active").removeClass('active');
            $(this).parent().addClass('active');
            
            let prevPageNumber = value-1;
            
            let newFrom = prevPageNumber * currentNumberOfRows;
    
            if(value == 1){
                newFrom = 0;
            }
    
            newPageNumber = parseInt(value);
    
            let newTo = currentNumberOfRows * newPageNumber;
            
            tabsLoaded = false;

            flushPosts(newFrom,newTo,newPageNumber);
        }
    });
}

function prepareNumberOfPostsHook(){
    $("#inlineFormCustomSelectPref1").change(function(){
        let newNumberOfRows = $('#inlineFormCustomSelectPref1 option').filter(':selected').text();
        if(currentPage == 1){
            flushPosts(0,newNumberOfRows,currentPage);
        }else {
            flushPosts(currentNumberOfRows,newNumberOfRows,currentPage);
        }
    });
    
}

jQuery(document).ready(function($){ //wait for the document to load
    prepareNumberOfPostsHook();
});

