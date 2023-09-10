let currentNumberOfRows = parseInt($('#inlineFormCustomSelectPref1 option').filter(':selected').text());
let currentPage = parseInt($(".page-item.active").children('a').text());

// API Url
const ApiURL = 
      "http://localhost/api/getnews";
  
// Defining async function
let numberOfPagesSet = false;

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
    //number_of_news = data.length;

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

    if(!numberOfPagesSet){
        console.log("Page number is = "+pagenumber);
        console.log("numberOfPages status = "+numberOfPagesSet);
        setNumberOfPages(data.length,pagenumber);
        numberOfPagesSet = true;
    }
    
    //double check this !!!!!!!!!!!!!!!!!!!!!!
    setSpecificPage(pagenumber);

    show(finaldata);
}


//setNumberOfPages(100,1);

function setNumberOfPages(lengthOfData,pagenumber) {
    $('#pagesList').empty();

    //currentNumberOfRows = parseInt($('#inlineFormCustomSelectPref1 option').filter(':selected').text());
    let lastPage = 0;
    let onlyOnePage = false;

    console.log("length of data ="+lengthOfData);
    console.log("current number of rows ="+currentNumberOfRows);

    if(lengthOfData <= currentNumberOfRows){
        lastPage = 2;
        onlyOnePage = true;
    }else {
        lastPage = Math.ceil(lengthOfData/currentNumberOfRows);

        lastPage = lastPage + 1;
    }

    console.log("last page = "+lastPage);

    for(var i = 1;i < lastPage;i++){
        if(i == pagenumber){
            if(onlyOnePage){
                $( "#pagesList" ).append( "<li class='page-item active'><a class='page-link' href='#"+i+"' style='border-top-left-radius: 0;border-bottom-left-radius: 0;'>"+i+"</a></li> ");
                console.log("inside the radius thing");
            }else {
                $( "#pagesList" ).append( "<li class='page-item active'><a class='page-link' href='#"+i+"'>"+i+"</a></li> ");
            }
        }else {
            $( "#pagesList" ).append( "<li class='page-item'><a class='page-link' href='#"+i+"'>"+i+"</a></li> ");
        }
    }
}

function setSpecificPage(pagenumber){
    $(".page-item.active").removeClass('active');

    $('#pagesList').children('li').each(function () {
    let currentPageNumber = parseInt($(this).children('a').text()); // "this" is the current element in the loop
    if(pagenumber == currentPageNumber){
        $(this).addClass('active');

        //console.log("Here at next the current page is = "+pageNumber);
    }
    });

}

function show(data) {
    if(data.length <= 0){
        $("#news_space").append('<h3 style="text-align:center;margin-right:50px;" class="nonewsfound_message"></h3>');
        clearTranslations();
        translateSite();
    }else {
    // Loop to access all rows 
        for(var i = 0;i < data.length;i++) {

            if(data[i].image === null){
                data[i].image = '<span class="circle circle-sm bg-primary"><i class="fe fe-radio fe-16 text-white"></i></span>'
            }else {
                data[i].image = '<img src="'+data[i].image+'" style="width:32px;" alt="news image">';
            }

            let news_row = `
            <div class="list-group-item">
                <div class="row align-items-center">
                <div class="col-auto">
                    `+data[i].image+`
                </div>
                <div class="col">
                    <h4><a href="/news/`+data[i].id+`"><strong>`+data[i].title+`</strong></a></h4>
                    <small>`+data[i].created_at+`</small>
                </div>
                </div> <!-- / .row -->
            </div><!-- / .list-group-item -->
            `  

            $("#news_space").append(news_row);
        }
    }
}

function flushPosts(from,to,pagenumber){
    $("#news_space").empty();
    callPosts(ApiURL,from,to,pagenumber);
}

function flushAllNews(){
    $("#news_space").empty();
    $("#pagesList").empty();
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

        //second we move the option to the one which was choosen 
        if(value === 'next' || value === 'previous'){
            if(value === 'previous' && currentPageNumber == 1){
    
            }else if(value === 'next' && currentPageNumber >= totalPages){
    
            }else {
                if(value === 'next'){
                    $(".page-item.active").next().addClass('active');
                    $(".page-item.active").removeClass('active');

                    console.log($(".page-item.active"));
                    
                    newPageNumber = currentPageNumber+1;
                    newCurrentNumberOfRows = currentNumberOfRows * currentPageNumber;
    
                    let toPosts = currentNumberOfRows * newPageNumber;

                    flushPosts(newCurrentNumberOfRows,toPosts,newPageNumber);
                }else {                  
                    $(".page-item.active").prev().addClass('active');
                    $(".page-item.active").removeClass('active');
                    
                    newPageNumber = currentPageNumber-1;
                    newCurrentNumberOfRows = currentNumberOfRows * (currentPageNumber-2);
    
                    let toPosts = currentNumberOfRows * newPageNumber;
    
                    if(newPageNumber == 1){
                        newCurrentNumberOfRows = 0;
                    }
    
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

async function searchNews(){
    if($("#search1").val().length <= 0){
        numberOfPagesSet = false;
        flushAllNews();
        callPosts(ApiURL,0,10,1).then(function() {
            //this one to solve problem of hook not attached
            prepareNumberOfPostsHook();
            preparePagesHook();
            }, 
        );

    }else {
        const newsRequest = await fetch(ApiURL);
        var data = await newsRequest.json();
        finaldata = [];

        for(var i = 0;i < data.length;i++) {
            if(data[i].title.toLowerCase().includes($("#search1").val().toLowerCase())){
                finaldata.push(data[i]);
            }
        }

        flushAllNews();
        show(finaldata);
    }
    

    
}

jQuery(document).ready(function($){ //wait for the document to load
    // Calling that async function
    callPosts(ApiURL,0,10,1).then(function() {
            //this one to solve problem of hook not attached
            prepareNumberOfPostsHook();
            preparePagesHook();
        }, 
    );

    $("#search1").keyup(function(){
        searchNews();
    });


});

