!function(a){"use strict";a.fn.quoteabilly=function(){var b=a(this),c=b.data("quote")||b.text(),d=b.data("class")||!1,e=b.data("via"),f=b.data("url")||quoteabilly.url,g=b.data("button")||quoteabilly.btn,h=b.data("target")||"_blank";b.append(" <a href='https://twitter.com/intent/tweet?"+encodeURI("via="+e+"&text="+c+"&url="+f)+"' target='"+h+"'>"+g+"</a>"),d&&b.addClass(d)},a(function(){a(".quoteabilly").quoteabilly()})}(jQuery);