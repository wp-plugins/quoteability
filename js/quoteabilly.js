!function(a){"use strict";a.fn.quoteabilly=function(){return this.each(function(){var b=a(this),c=b.data("quote")||b.text(),d=b.data("class")||!1,e=b.data("via")||!1,f=b.data("url")||quoteabilly.url,g=b.data("button")||quoteabilly.btn,h=b.data("target")||"_blank",i="https://twitter.com/intent/tweet?text="+c+"&url="+f;e&&(i+="&via="+e),b.append(" <a href='"+encodeURI(i)+"' target='"+h+"'><i class='icon-twitter'></i>"+g+"</a>"),d&&b.addClass(d)})},a(function(){a(".quoteabilly").quoteabilly()})}(jQuery);