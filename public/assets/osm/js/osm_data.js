/* Global variables START */

var keywords;

/* Global variables END */

$(document).ready(function()
{

    $("#keywordField").change(function()
    {
        console.log(this.value);
        keywords = this.value;
    });



    var url = '/bars/find?keywords=';

    $("#queryNode").click(function()
    {
        $.getJSON(url+keywords, function(data)
        {
            console.log(data);

            $.each(data, function(key,value)
            {
                console.log(value['node']);

                $.each(value, function(k,v){
                    console.log(v);
                });
            });
        });
    });
});
