//hy-1.1.js
//Copyright 2013 Hanyang Information & communication Co,.Ltd. All rights reserved.

var ready = (function(){

    var readyList,
        DOMContentLoaded,
        class2type = {};
        class2type["[object Boolean]"] = "boolean";
        class2type["[object Number]"] = "number";
        class2type["[object String]"] = "string";
        class2type["[object Function]"] = "function";
        class2type["[object Array]"] = "array";
        class2type["[object Date]"] = "date";
        class2type["[object RegExp]"] = "regexp";
        class2type["[object Object]"] = "object";

    //ReadyObj define
	var ReadyObj = {
        // Is the DOM ready to be used? Set to true once it occurs.
        isReady: false,
        // A counter to track how many items to wait for before
        // the ready event fires. See #6781
        readyWait: 1,
        // Hold (or release) the ready event
        holdReady: function( hold ) {
            if ( hold ) {
                ReadyObj.readyWait++;
            } else {
                ReadyObj.ready( true );
            }
        },
        // Handle when the DOM is ready
        ready: function( wait ) {
            // Either a released hold or an DOMready/load event and not yet ready
            if ( (wait === true && !--ReadyObj.readyWait) || (wait !== true && !ReadyObj.isReady) ) {
                // Make sure body exists, at least, in case IE gets a little overzealous (ticket #5443).
                if ( !document.body ) {
                    return setTimeout( ReadyObj.ready, 1 );
                }
                // Remember that the DOM is ready
                ReadyObj.isReady = true;
                // If a normal DOM Ready event fired, decrement, and wait if need be
                if ( wait !== true && --ReadyObj.readyWait > 0 ) {
                    return;
                }
                // If there are functions bound, to execute
                readyList.resolveWith( document, [ ReadyObj ] );
                // Trigger any bound ready events
                //if ( ReadyObj.fn.trigger ) {
                //  ReadyObj( document ).trigger( "ready" ).unbind( "ready" );
                //}
            }
        },
        bindReady: function() {
            if ( readyList ) {
                return;
            }
            readyList = ReadyObj._Deferred();

            // Catch cases where $(document).ready() is called after the
            // browser event has already occurred.
            if ( document.readyState === "complete" ) {
                // Handle it asynchronously to allow scripts the opportunity to delay ready
                return setTimeout( ReadyObj.ready, 1 );
            }

            // Mozilla, Opera and webkit nightlies currently support this event
            if ( document.addEventListener ) {
                // Use the handy event callback
                document.addEventListener( "DOMContentLoaded", DOMContentLoaded, false );
                // A fallback to window.onload, that will always work
                window.addEventListener( "load", ReadyObj.ready, false );

            // If IE event model is used
            } else if ( document.attachEvent ) {
                // ensure firing before onload,
                // maybe late but safe also for iframes
                document.attachEvent( "onreadystatechange", DOMContentLoaded );

                // A fallback to window.onload, that will always work
                window.attachEvent( "onload", ReadyObj.ready );

                // If IE and not a frame
                // continually check to see if the document is ready
                var toplevel = false;

                try {
                    toplevel = window.frameElement == null;
                } catch(e) {}

                if ( document.documentElement.doScroll && toplevel ) {
                    doScrollCheck();
                }
            }
        },
        _Deferred: function() {
            var // callbacks list
                callbacks = [],
                // stored [ context , args ]
                fired,
                // to avoid firing when already doing so
                firing,
                // flag to know if the deferred has been cancelled
                cancelled,
                // the deferred itself
                deferred  = {

                    // done( f1, f2, ...)
                    done: function() {
                        if ( !cancelled ) {
                            var args = arguments,
                                i,
                                length,
                                elem,
                                type,
                                _fired;
                            if ( fired ) {
                                _fired = fired;
                                fired = 0;
                            }
                            length = args.length
                            for ( i = 0; i < length; i++ ) {
                                elem = args[ i ];
                                type = ReadyObj.type( elem );
                                if ( type === "array" ) {
                                    deferred.done.apply( deferred, elem );
                                } else if ( type === "function" ) {
                                    callbacks.push( elem );
                                }
                            }
                            if ( _fired ) {
                                deferred.resolveWith( _fired[ 0 ], _fired[ 1 ] );
                            }
                        }
                        return this;
                    },

                    // resolve with given context and args
                    resolveWith: function( context, args ) {
                        if ( !cancelled && !fired && !firing ) {
                            // make sure args are available (#8421)
                            args = args || [];
                            firing = 1;
                            try {
                                while( callbacks[ 0 ] ) {
                                    callbacks.shift().apply( context, args );//shifts a callback, and applies it to document
                                }
                            }
                            finally {
                                fired = [ context, args ];
                                firing = 0;
                            }
                        }
                        return this;
                    },

                    // resolve with this as context and given arguments
                    resolve: function() {
                        deferred.resolveWith( this, arguments );
                        return this;
                    },

                    // Has this deferred been resolved?
                    isResolved: function() {
                        return !!( firing || fired );
                    },

                    // Cancel
                    cancel: function() {
                        cancelled = 1;
                        callbacks = [];
                        return this;
                    }
                };

            return deferred;
        },
        type: function( obj ) {
            return obj == null ?
                String( obj ) :
                class2type[ Object.prototype.toString.call(obj) ] || "object";
        }
    }


    // The DOM ready check for Internet Explorer
    function doScrollCheck() {
        if ( ReadyObj.isReady ) {
            return;
        }

        try {
            // If IE is used, use the trick by Diego Perini
            // http://javascript.nwbox.com/IEContentLoaded/
            document.documentElement.doScroll("left");
        } catch(e) {
            setTimeout( doScrollCheck, 1 );
            return;
        }

        // and execute any waiting functions
        ReadyObj.ready();
    }

    // Cleanup functions for the document ready method
    if ( document.addEventListener ) {
        DOMContentLoaded = function() {
            document.removeEventListener( "DOMContentLoaded", DOMContentLoaded, false );
            ReadyObj.ready();
        };

    } else if ( document.attachEvent ) {
        DOMContentLoaded = function() {
            // Make sure body exists, at least, in case IE gets a little overzealous (ticket #5443).
            if ( document.readyState === "complete" ) {
                document.detachEvent( "onreadystatechange", DOMContentLoaded );
                ReadyObj.ready();
            }
        };
    }

    function ready( fn ) {
        // Attach the listeners
        ReadyObj.bindReady();

        var type = ReadyObj.type( fn );

        // Add the callback
        readyList.done( fn );//readyList is result of _Deferred()
    }

    return ready;
})();






















var BC = function BC() //browser check
{
	var bT = -1,
		nav = navigator;

	if (nav.appName == 'Microsoft Internet Explorer'){
		var ua = nav.userAgent;
		var re  = new RegExp("MSIE ([0-9]{1,}[\.0-9]{0,})");
		if (re.exec(ua) != null)
			bT = parseInt( RegExp.$1 );
	}

	return bT;
};









var FC = function FC() // FormatCheck
{
	//IE�� ���� EOT�� ���õǾ� �ֱ� ������ FormatCheck���� ����.
	//üũ�ϴ� ���� ��ų��, ��뵵�� ���� ������, ����̽� ������ üũ�ϴ°��� ȿ����.
	var wi = window;
	var agent = wi.navigator.userAgent;

	if( agent.indexOf( 'Mac' ) > -1 ){

		if( agent.indexOf( 'iPhone' ) > -1 || agent.indexOf( 'iPad' ) > -1 ){
			var startIOS = agent.indexOf( 'OS ' );
			if (startIOS == -1)
				return "woff";

			var iOSVer = wi.Number( agent.substr( startIOS + 3, 3 ).replace( '_', '.' ) );
			wi.g_Browser = "safari";

			if(iOSVer>-1 && iOSVer <5){
				g_ForceSubset = true;	//ttf �϶� Ǯ�¾��ش�
				return "ttf";
			}
			else{
				return "woff";
			}
		}
		else{
			var version = agent.indexOf('OS X 10');		
			agent = agent.substr(version+7, 2).replace( /\_|\./gi, "");
			if( agent < 5 ){				//10.5�̸��϶� ����������ϰ� TTF
				g_ForceSubset = true;	//ttf �϶� Ǯ�¾��ش�
				return "ttf";
			}
			else{
				return "woff";
			}
		}
	}

	if( agent.indexOf( 'Android' ) > -1  ){
		g_ForceSubset = false;	//ttf �϶� Ǯ�¾��ش�
		return "ttf";
	}


	if ( agent.indexOf( 'Chrome' ) > -1  ){
		g_FType = "O";

		var verIdx = agent.indexOf( 'Chrome/' );
		agent= agent.substr(verIdx+7, agent.length);
		verIdx = agent.indexOf(".");
		version = agent.substr(0, verIdx) * 1;

		if( version < 6 )	{// ������ 6�����̸� ���� ��������
			return "";
		}

		return "woff";
	}

	if ( agent.indexOf( 'firefox' ) > -1 || agent.indexOf( 'Firefox' ) > -1){
		agent = agent.toLowerCase();
		var t = agent.indexOf( 'firefox')+8;
		agent = agent.substr(t, agent.length);
		
		var arr = agent.split(".");
		agent = arr[0] + "." + arr[1];
		agent = parseFloat( agent ).toFixed( 1 );

		if( agent < 3.6 ) { //������ 3.6�����̸� �ڵ� ����� ��ȯ
			g_ForceSubset = true;
		}

		g_FType = "O";
		return "woff";
	}

/*
	var startIOS = agent.indexOf( 'OS ' );
	if( ( agent.indexOf( 'iPhone' ) > -1 || agent.indexOf( 'iPad' ) > -1 ) && startIOS > -1 ){
		var iOSVer = wi.Number( agent.substr( startIOS + 3, 3 ).replace( '_', '.' ) );
		wi.g_Browser = "safari";

		if(iOSVer>-1 && iOSVer <5){
			g_ForceSubset = true;	//ttf �϶� Ǯ�¾��ش�
			return "ttf";
		}
		else{
			return "woff";
		}
	}
*/
	

	if( agent.indexOf( 'Opera' ) > -1 || agent.indexOf( 'opera' ) > -1){ //���� ��������
		return ""; 
	}

	if( agent.indexOf( 'Safari' )>-1){
		wi.g_Browser = "safari";

		agent = agent.toLowerCase();
		var t = agent.indexOf( 'version' ) + 8;
		agent = agent.substr(t, agent.length);
		var arr = agent.split(".");

		agent = arr[0] + "." + arr[1];
		agent = parseFloat(agent).toFixed(2);


		if(agent < 4.04) { //������ 4.04 �����̸� �ڵ� ����� ��ȯ
			g_ForceSubset = true;
		}
		return "woff";
	}

	if (agent.indexOf('AIR') > -1)	//�ͽ��ټ� �ϰ�� TTF 
	{
		return "ttf";
	}


	return "woff";
};











var recurseNode = function recurseNode ( mynode, objRegExFont, FT, FN, func ) {
	func( mynode, objRegExFont, FT, FN );
	mynode = mynode.firstChild;
	while( mynode ) {
		recurseNode( mynode, objRegExFont, FT, FN, func );
		mynode = mynode.nextSibling;
	}
};












var setCookie2 = function setCookie2( param_name, param_value ){
	var todayDate = new Date();     
	//��Ű��ȿ�Ⱓ ����    
	todayDate.setDate( todayDate.getDate() + 365 );
	//��Ű���� 
	document.cookie = param_name + "=" + escape( param_value ) + "; path=/ ; expires=" + todayDate.toGMTString() + ";" ;
};








var readCookie = function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
};







var strhash = function strhash( str ) {
	var hash = 5381,
		strlen = str.length,
		i = 0;

	for(i=0; i<strlen; i++){
		hash = ( ( hash<<12 ) + hash ) + str.charCodeAt(i);
		hash = hash & hash;
	}

	if(hash < 0){
		hash = "0XFFFFFFFF" + hash + 1;
	}
	var res = hash.toString(16);
	res = res.toUpperCase();
	res = "00000000" + res;

	res = res.substr(res.length-8, 8);
	return res;
};






//sendServer �Լ�//////////////////////////////////////////////////////
//1. ������ؾ��� �����͸� ����(��Ʈ�� �ؽ������� ������)
//2. �����͸� post �� submit 
//3. ȭ�鰻�� (addNode) ȣ��
var sendServer = function sendServer(param) // param :  view(safari) & full(the other browser)
{
	var wi = window;

	var AF = wi.g_AFont, AF_len = AF.length;	//AF:������Է¹��� ��Ÿ�����Ǹ� �籸���� �迭(�Լ��Ķ���ͷ� ���޹޾���)
	if ( AF_len < 1){
		return;
	}
	var	FT = wi.g_FT, FT_len = FT.length;		//FT: post�� ��� ������ (��Ʈ��===����)
	if ( FT_len < 1 ){
		return;
	}

	var inputEle = null,
		ifm = null,
		doc = document,
		strHash = "",				//��������Ʈ������ ���� �ؽ���
		ref = "",
		subFT = [],				// FT�� split�Ѱ�
		str = "",					// subFT[1]�� ��
		fn = "",					// subFT[0]�� ��
		newName = "",			// �ؽ����� ���� ���ο� ��Ʈ��
		ST = "",					// ��Ÿ���ؽ�Ʈ
		postData = "",			// post�� ���ڿ�
		fn_spl = "===",			// ��Ʈ��===����
		//ref_spl �� _ ��ſ� OTF, TTF �����ڸ� �ֱ�� ��. ������Ʈ��O�ؽ���(16�ڸ�) Ȥ�� ������Ʈ��T�ؽ���(16�ڸ�)
		ref_spl = wi.g_FType,	// 01CSNMO1111111122222222
		fFMT = wi.g_fFMT,
		spl = "=__=",				// postData�� spliter
		FFS = wi.g_FFS,
		FFF = wi.g_FFF;


	//if(param == "full"){
	var META = doc.getElementsByTagName( "META" );
	var attMETA = "", 
		csIdx = -1;

	//meta check start
	for( x=0 ; x < META.length ; x++ ){
		if(META[x].outerHTML)
			attMETA = META[x].outerHTML.toLowerCase();
		else if(META[x].attributes.getNamedItem("content"))
			attMETA = META[x].attributes.getNamedItem("content").nodeValue;
		else{
			continue;
		}

		csIdx = attMETA.indexOf("charset");

		if(csIdx>-1){
			attMETA = attMETA.replace(/\"|\'|\>|\=/g, "");
			csIdx = attMETA.indexOf("charset");
			attMETA = attMETA.substr(csIdx+7, attMETA.length);
			var arr = attMETA.split(" ");
			for(var ai=0; ai<arr.length; ai++){
				if(arr[ai] != ""){
					postData = arr[ai].replace("\;", "");
					break; 
				}
			}

			if ( postData != "" )
				break;
		}
	}//meta check end

	if( postData == "" ){return; }	//���ڼ� ������ ������ ������� �� ����.

	postData = postData.concat( spl , fFMT , spl , wi.client_c , spl, wi.hp_id, spl );
	//}
	

	ref = location.href;
	
	var fti = afi = afii = 0;

	//������ؾߵǴ� ��Ʈ��, ��Ʈ�� �����Ͽ� postData, CSS ����
	var txt1 = "@font-face {font-family:'" ,
		txt2 = "{font-family:'" ,
		txt3 = "' !important; letter-spacing:0px !important;}\n" ,
		txt4 = "FULLSETFONT",
		txt5 = "SUBSETFONT";

	//g_AFont�� ��Ʈ���� �ؽ��� ��Ʈ������ �����ϰ�, ST����
	while( fti < FT_len )
	{
		subFT = FT[fti++].split( fn_spl ); //fontname===strings
		fn = subFT[0];
		str = subFT[1];
		// console.log('ref = ',ref,' str = ',str)
		strHash = strhash( ref + str );	//���ϸ��ؽ��� ref�� �߰��ϵ��� ���� 20130327
		strHash = strHash.toString();
		newName = fn.concat( ref_spl , strHash );

		//if(param == "full"){
		postData = postData.concat( newName , fn_spl , str , spl );
		//}
		
		ST = ST.concat( txt1 , newName , FFS , newName , FFF );	//txt1 = "@font-face {\nfont-family: '" ,

		for( afi=0 ; afi<AF_len ; afi++ ){
			if( AF[afi][0] == fn ){
				if( AF[afi][1] == txt5 ){ 
					AF[afi][0] = newName; //�ؽ��� �߰��� �̸����� ������.
				}
				break;
			}
		}
	}


	//if(param == "full"){
	postData = postData.replace(/\=\_\_\=$/g, ""); //���ڿ����� ���ø��ͻ��� =__=

	var ifmname = "fontIFM" ;

	if(g_bT == 7 || (g_bT >0 && g_bT <10 && doc.compatMode == "BackCompat" )) //IE7�̰ų�, IE10 ���Ͽ��� ��ũ ����϶�
		var ifm = doc.createElement( '<iframe name="' + ifmname + '">' );
	else{
		var ifm = doc.createElement( 'iframe' );
		ifm.setAttribute( "name" , ifmname );
	}
	ifm.setAttribute( "id" , ifmname );
	ifm.setAttribute( "display" , "none" );
	ifm.setAttribute( "width" , "0px" ); 
	ifm.setAttribute( "height" , "0px" ); 
//	ifm.frameBorder = 0;
	ifm.style.display = 'none';
	doc.body.appendChild(ifm);

	var frm = doc.createElement( "form" );
	frm.setAttribute( "name" , "frm" );
	frm.setAttribute( "id" , "frm" );
	frm.setAttribute( "method" , "post" );
	frm.setAttribute( "action" , SERVER_POST );
	frm.setAttribute( "target" , ifmname );
	frm.style.display = 'none';
	doc.body.appendChild( frm );

	inputEle = doc.createElement( "input" );
	inputEle.setAttribute( "type" , "hidden" );
	inputEle.setAttribute( "name" , "HYFont" );
	inputEle.setAttribute( "value" , postData );
	inputEle.style.display = 'none';
	frm.appendChild( inputEle );
	frm.submit();
	//}
	setTimeout(function(){

		var tmpFN = "", tmpFLen = 0;

		for( afi=0 ; afi < AF_len ; afi++ ){
			AF_sLen = AF[afi].length;
			if( AF[afi][1] == txt4 ){ //fullsetfont �϶� ST����������,  DetectCSS���� fullset �϶� AddNodeó������.
				continue;
				//ST = ST.concat( txt1 , AF[afi][0] , FFS , AF[afi][0] , FFF ); // ST += "@font-face {\nfont-family: '" + AF[afi][0] + FFS + AF[afi][0] + FFF;
			}

			tmpFN = AF[afi][0];
			tmpFLen = tmpFN.length;
			if( tmpFLen < 10 )			//����� ��Ʈ�� üũ (������ + �ؽ��� --> 9�ڸ�)
				continue;

			tmpFN = tmpFN.substr( tmpFLen-9, 1 );	
			if ( tmpFN != "T" && tmpFN != "O")		//��ƮŸ�� üũ
				continue;

			afii=2;
			while( afii < AF_sLen ){
				ST = ST.concat( AF[afi][afii++] , txt2 , AF[afi][0] , txt3 ); // ST += AF[afi][afii++] + "{font-family:'" + AF[afi][0] + "' !important; letter-spacing:0px !important;}\n";
			}		
		}

		//��Ÿ�ϳ�� ����
		AddNode(ST);

	}, 1);
	
};







//stylesheet ���ȣ���ϰ�, ȣ���� ������ ���ڷ� �Ѿ�� �Լ� ȣ��
var RecurseCSS_FList_IEOld = function RecurseCSS_FList_IEOld( sheet  ){
	var importLen = sheet.imports.length;
	for(var i=0 ; i<importLen ;){
		RecurseCSS_FList_IEOld( sheet.imports[i++] );
	}

	if (sheet.cssText  != "")	{
		RecurseCSS_FListMake_IEOld( sheet.cssText );
	}
};




var RecurseCSS_FListMake_IEOld = function RecurseCSS_FListMake_IEOld( CT ){
	var wi = window, 
		fullType = wi.g_FType + "full";		// 01CSNMOfull , 01CSNMTfull (OTF, TTF �����ϱ� ����)

	var pattern_FF = /@font-face\s{\r\n\tfont-family:(\s?)[A-Za-z0-9].*;\r\n\tsrc:(\s?)url\(http\:[\/]{2,}[\._a-zA-Z0-9\-\?\/]+\);/i,
		pattern_FN = /font-family:(\s?)[A-Za-z0-9].*;/i , 
		pattern_FT_full = /load.typeengine.co.kr\/\?fullset/i, 
		pattern_FT_sub = /load.typeengine.co.kr\/\?subset/i, 
		regexpFN1 = "(" ,
		regexpFN2 = ")|" ,
		txt8 = "font-family:",
		txt9 = "fullset";

	var FN = "" ,					// fontface ���� ������ ��Ʈ��
		FT = "" ,		
		FList = wi.g_FList,		// fontface ���� ������ ��ȿ�� ��Ʈ���� ����Ʈ
		RSF = wi.g_RSF , 
		FF = wi.g_FF,
		FF_out,
		FF_outstr = "",
		FT_out_full,
		FT_out_sub,
		bProcess = false;



	while(1){
		// block check
		FF_out = CT.match( pattern_FF );	//font-family, src �ڵ尡 �ִ� ���� ã�´�
		if (!FF_out){ break; }
		CT = CT.substr(FF_out.lastIndex, CT.length);
		FF_outstr = FF_out[0];


		// FT check
		FT_out_full = FF_outstr.match( pattern_FT_full );							// /load.typeengine.co.kr\/\?fullset/i, 
		FT_out_sub = FF_outstr.match( pattern_FT_sub );							// /load.typeengine.co.kr\/\?subset/i, 
		if(FT_out_full){
			FT = FT_out_full[0].replace(  /load.typeengine.co.kr\/\?/i , "" ).toLowerCase();
		}
		else if(FT_out_sub){
			FT = FT_out_sub[0].replace(  /load.typeengine.co.kr\/\?/i , "" ).toLowerCase();
		}
		else{
			continue; 
		}


		// FN check
		FN_out = FF_outstr.match( pattern_FN );							//pattern_FN = /@font-face {\r\n\tfont-family: [A-Za-z0-9].*;/i
		if( !FN_out ){ continue; }
		FN = FN_out[0].replace( txt8 , "" ).replace(" ", "").replace( ";" , "" ).toLowerCase();


		if( FN == "" || FT == "" )
			continue;

		if ( FList.indexOf( "(" + FN + ")" ) < 0 ){	//FN�ߺ�üũ
			FList += regexpFN1 + FN + regexpFN2;							// ( + FN + )|
				
			if( FT == txt9 ){ // "fullset"
				FF += regexpFN1 + FN + fullType + regexpFN2 ;			// ( + FN + Tfull + )|
			}
			else{	// �����
				if (FN.substr(0,1) == "l" || FN.substr(0,3) == "ofl"){			//������Ʈ�̸� Ǯ��
					FF += regexpFN1 + FN + fullType + regexpFN2 ;			// ( + FN + Tfull + )|
				}
				else{
					RSF += regexpFN1 + FN + regexpFN2;  // ( + FN + )|
				}
			}
			bProcess = true;
		}

	}
	if( bProcess ){
		wi.g_FList = FList;
		wi.g_FF = FF;
		wi.g_RSF = RSF;
	}

};






//stylesheet ���ȣ���ϰ�, ȣ���� ������ ���ڷ� �Ѿ�� �Լ� ȣ��
var RecurseCSS_FN_IEOld = function RecurseCSS_FN_IEOld ( sheet , param ){
	var importLen = sheet.imports.length;
	for( var i=0 ; i<importLen ; ){
		RecurseCSS_FN_IEOld(sheet.imports[i++], param);
	}

	rules = sheet.cssRules? sheet.cssRules: sheet.rules;
	if ( !rules ) { return; }
	RecurseCSS_FNMake_IEOld( rules, param );
};






var RecurseCSS_FNMake_IEOld = function RecurseCSS_FNMake_IEOld( rules, param ){
	var FList = param.FList,		// fontface ���� ������ ��ȿ�� ��Ʈ���� ����Ʈ
		FF = param.FF,
		RSF = param.RSF,
		fullType = param.fullType,
		FFS = param.FFS,
		FFF = param.FFF,
		AF = param.AF;

	var FN = "" ,		// fontface ���� ������ ��Ʈ��
		AFlen = 0,
		afi = 0, 
		selector = "";
	
	var rlen = 0, 
		tmp_rules;

	var AF_FN = "",
		FN_full = "",
		bAFDup = false,
		ST = "",
		STT = "",
		txt3 = "@font-face {\nfont-family: '",
		txt6 = "{font-family:'",
		txt7 = "' !important; letter-spacing:0px !important;}\n",
		FULLSETFONT = "FULLSETFONT",
		SUBSETFONT = "SUBSETFONT",
		bProcess = false;

	rlen = rules.length;

	//css dom check, make AF
	for (var i=0  ; i<rlen ; i++ ){
		tmp_rules = rules[i];

		FN = tmp_rules.style.fontFamily;
		if ( !FN ) { continue; }

		FN = FN.replace( /\\|\"|\'| /gi, "" ).toLowerCase();
		if ( FN == "" ) { continue; }

		// check font-family fallback , get FN
		if ( FN.indexOf( "," ) > -1 ){	//���� ��Ÿ���̸� �ϳ��� üũ�ϰ�
			F_arr = FN.split( "," );
			FN = null;
			for( fi = 0 ; fi < F_arr.length ; fi++ ){
				if ( FList.match( "("+F_arr[ fi ]+")")  ) {  //��Ʈ����Ʈ�� �ִ� ��Ʈ������ Ȯ���ϰ�
					FN = F_arr[ fi ]; 
					break; 
				}
			}					
		}
		else{	//�Ѱ��� �ִ� ��Ÿ���̸� �Ѱ��� üũ
			if(	!FList.match( "(" + FN + ")" ) ){
				continue;
			}
		}			
		if( !FN ) { continue; }														// FList�� ���� ��Ʈ���̸� skip
		
		selector = tmp_rules.selectorText;											// get selector
		AFlen = AF.length;															// selector push (AF)
		FN_full = FN + fullType;
		bAFDup = false;

		for( afi = 0 ; afi<AFlen ; afi++ ){
			AF_FN = AF[afi][0];

			//�������Ʈ���̰�, 
			if( AF_FN == FN ){
				if ( ( AF[afi].toString().indexOf( selector ) < 0 )  && ( FN.match(RSF) ) ){ //�ߺ� array �� �ƴϰ� , ������̸�
					bAFDup = true;
					AF[afi].push( selector );
					break;
				}
			}
			//Ǯ����Ʈ���̰�, �ߺ� array �� �ƴϰ�, Ǯ����Ʈ�̸�
			else if( AF_FN == FN_full ){
				if( ( AF[afi].toString().indexOf( selector ) < 0 )  && ( FN_full.match( FF ) ) ){
					bAFDup = true;
					AF[afi].push( selector );
					ST = ST.concat( selector , txt6 , FN_full , txt7 );				// txt6 = "{font-family:'", txt7 = "' !important; letter-spacing:0px !important;}\n" ;
					break;
				}
			}

		}
		if( bAFDup ){
			bProcess = true;
			continue;
		}

		// if first --> AF push
		var subarr = [];
		//var tmpFN = "(" + FN + ")";

		if( FF.indexOf( FN_full ) > -1 ){
			if( AF.toString().indexOf( FN_full ) < 0 ){
				subarr.push( FN_full );
				subarr.push( FULLSETFONT );
				subarr.push( selector );
				AF.push( subarr );
				bProcess = true;

				STT = STT.concat( txt3 , FN_full , FFS , FN_full , FFF );			//txt3 = "@font-face {\nfont-family: '";
				ST = ST.concat( selector , txt6 , FN_full , txt7 );					// txt6 = "{font-family:'", txt7 = "' !important; letter-spacing:0px !important;}\n" ;
			}
		}
		else if( RSF.indexOf( "(" + FN + ")" ) > -1 ){
			if( AF.toString().indexOf( FN+"," ) < 0 ){
				subarr.push( FN );
				subarr.push( SUBSETFONT );
				subarr.push( selector );
				AF.push( subarr );
				bProcess = true;
			}
		}
	
	} //rule loop2 end

	if (bProcess &&  ( STT != ""  || ST!= "" )){
		var wi = window;
		wi.g_AFont = AF;
		wi.g_STT += STT;
		wi.g_ST += ST;
		return;
	}
	else{
		if ( bProcess )
			window.g_AFont = AF;

		if ( STT != ""  || ST!= "" ){ 
			var wi =window;
			wi.g_STT += STT;
			wi.g_ST += ST;
			//AddNode( STT + ST );
		}
	}
};






//stylesheet ���ȣ���Լ�
var RecurseCSS = function RecurseCSS( funcRecurse, host , data,  funcMake ){
	var doc = document,
		slen = doc.styleSheets.length,												// style sheet ����
		str_href = "",
		sheet = "",																	// document style sheet 
		si = 0 ;

	for( si = 0 ; si<slen ; si++ ){
		str_href = doc.styleSheets[si].href;
		if( str_href ){		if( !str_href.match( host ) ) {	continue; }		}	// cross domain �̸� �н�.

		sheet = doc.styleSheets[si];
		if ( !sheet ) {	continue;}

		funcRecurse( sheet , data, host, funcMake );
	}
};




//stylesheet ���ȣ���ϰ�, ȣ���� ������ ���ڷ� �Ѿ�� �Լ� ȣ��
var RecurseMake = function RecurseMake ( sheet , data,  host, funcMake ){

	var rules = sheet.cssRules? sheet.cssRules: sheet.rules;
	if (!rules) { return; }

	var rlen = rules.length;
	for (var i=0 ; i<rlen ; i++){
		tmp_rules = rules[i];
		if (!tmp_rules){	continue;	}

		if( tmp_rules.type == 3 ) { //import check, cross domain check
			str_href = tmp_rules.styleSheet.href;
			if( str_href ){		if( !str_href.match( host ) ) {	break; }		}	

			RecurseMake( tmp_rules.styleSheet , data, host, funcMake );
		}
		else{
			break;
		}
	}

	funcMake( rules , data );
};






//CSS ���� ����� Ÿ�Կ��� font list ����, FF(fullset font), RSF(subset font)
var DetectCSS_IEStd_FList = function DetectCSS_IEStd_FList( rules, param ){
	var rlen = rules.length;
	if ( rlen <1 ) { return; }

	var fullType = param.fullType, 
		ForceSubset = param.ForceSubset,
		src_ss = param.src_ss, 
		src_fs = param.src_fs;

	var wi = window, 		
		FList = wi.g_FList,
		RSF = wi.g_RSF,
		FF = wi.g_FF;

	var FN = "", 
		tmp_rules,																	// rules �迭�� �ӽ� ������ ����
		regexpFN1 = "(" ,
		regexpFN2 = ")|" ,
		varFONTFAMILY = "font-family";
	
	var bProcess = false;															// true�϶��� windows���������� ������ ����

	for ( i=0 ; i<rlen ; i++ ){ 
		if(  rules.item(i).type != 5 ) { continue; }									// fontface�� ���Ҽ������� loop skip, type5 �ΰ��� ����ȵǴϱ� �迭�� ���� ����.

		tmp_rules = rules[i];

		FN  = tmp_rules.style.getPropertyValue( varFONTFAMILY );			 //"font-family"
		if ( !FN ) { continue; }
	
		FN = FN.replace(/\\|\"|\'| /gi, "").toLowerCase();
		if ( FN == "" ) { continue; }

//		if ( FList.indexOf( FN ) > -1 ){ continue; }								// �ߺ�üũ
		if ( FList.indexOf( "("+FN+")" ) > -1 ){ continue; }					// �ߺ�üũ

		csstext = tmp_rules.cssText;
		if( csstext )
			csstext = csstext.toLowerCase();
		else
			continue;

		if( csstext.indexOf( src_fs ) > -1 ){											// fontface�� src �� fullset �̸�
			FList = FList.concat( regexpFN1, FN , regexpFN2);					// "(" + FN +  ")|" 
			bProcess = true;

			if (ForceSubset){															//��������� ��ȯ�̸� ������ �����(������Ʈ�϶��� ������Ѵ�) 
				RSF = RSF.concat( regexpFN1, FN , regexpFN2) ;				//"(" + FN + ")|";
			}
			else{
				FF = FF.concat( regexpFN1, FN , fullType, regexpFN2) ;		//"(" + FN + ")|";
			}
		}
		else if( csstext.indexOf( src_ss ) > -1 ){									// fontface�� src �� subset �̸�
			FList  = FList.concat( regexpFN1 , FN , regexpFN2) ;				// "(" + FN +  ")|" 
			if ( (FN.substr(0,1) == "l" || FN.substr(0,3) == "ofl") && !ForceSubset ){					//������Ʈ�̸鼭, ������ȯ�� �ƴϸ�
				FF = FF.concat( regexpFN1, FN , fullType, regexpFN2) ;		//"(" + FN + ")|";
			}
			else{
				RSF = RSF.concat( regexpFN1, FN , regexpFN2) ;				//"(" + FN + ")|";
			}
			bProcess = true;
		}
	}

	if( bProcess ){
		wi.g_FList = FList;
		wi.g_FF = FF;
		wi.g_RSF = RSF;
	}

};





var DetectCSS_IEStd_AF = function DetectCSS_IEStd_AF( rules, param ){
	var rlen = rules.length;
	if ( rlen < 1){	return ;	}

	var FFS = param.FFS,								//Ǯ����Ʈ�ּ�
		FFF = param.FFF,									//�������Ʈ�ּ�
		fullType = param.fullType,						//Ǯ��Ÿ��(O, T)
		ForceSubset = param.ForceSubset,		//�����������ȯ �÷���
		FList = param.FList,								//��Ʈ����Ʈ
		FF = param.FF,										//Ǯ����Ʈ ����Ʈ
		RSF = param.RSF,								//����� ��Ʈ ����Ʈ
		AF = param.AF;										//��Ʈ����Ʈ

	var tmp_rules,
		FN = "",													//���ϸ�
		F_arrLen = 0,										//���ϸ� ���� ����
		F_arr = [],											//���ϸ� ����
		varFONTFAMILY = "font-family", 
		selector = "",											// Ŭ������ ���̵�
		bAFDup = false,									//AF ó���� ����
		AFlen = 0,												//AF ó���� ����
		varFULLSETFONT = "FULLSETFONT",	//AFó���� ���
		varSUBSETFONT = "SUBSETFONT" ,		//AFó���� ���
		AF_FN = "",											//AF ó���� ����
		FN_full = "",											//Ǯ����Ʈ�� �̸�����
		ST = "",													//��Ÿ�� ó���� ����
		STT = "",												//��Ÿ�� ó���� ����
		txt3 = "@font-face {\nfont-family: '", 	//��Ÿ�� ó���� ����
		txt6 = "{font-family:'",								//��Ÿ�� ó���� ����
		txt7 = "' !important; letter-spacing:0px !important;}\n"; //��Ÿ�� ó���� ����
	
	var bProcess = false;

	//css dom check, make AF
	for ( var i=0 ; i<rlen ; i++ ){
		tmp_rules = rules[i];
		
		if( tmp_rules.type != 1 ) { continue; }									// check continue status 

		FN = tmp_rules.style.getPropertyValue( varFONTFAMILY ) ; //"font-family"
		if ( !FN ) { continue; }															//safari�� ���, fon-family�� �νĸ��ϰ� font�� �ν���. 

		FN = FN.replace( /\\|\"|\'| /gi, "" ).toLowerCase();
		if ( FN == "" ) { continue; }

		// check font fallback, get FN
		if ( FN.indexOf( "," ) > -1 ){													//���� ��Ÿ���̸� �ϳ��� üũ�ϰ�
			F_arr = FN.split( "," );
			FN = null;
			F_arrLen = F_arr.length;
			for( var fi = 0 ; fi < F_arrLen ; fi++ ){
				//if ( F_arr[ fi ].match( FList ) ) {							 //��Ʈ����Ʈ�� �ִ� ��Ʈ������ Ȯ���ϰ�
				if ( FList.match( "(" + F_arr[ fi ] + ")" ) ) {							 //��Ʈ����Ʈ�� �ִ� ��Ʈ������ Ȯ���ϰ�
					//FN = tmp_rules.style.fontFamily = F_arr[ fi ];			 //document.styleSheets[si].cssRules[i].style.fontFamily = FN;							
					FN = F_arr[ fi ];
					break; 
				}
			}					
		}
		else{	//�Ѱ��� �ִ� ��Ÿ���̸� �Ѱ��� üũ
			if(	!FList.match( "(" + FN + ")" ) ){
				continue;
			}
		}
			
		if( !FN ) { continue; }														// FList�� ���� ��Ʈ���̸� skip

		selector = tmp_rules.selectorText;									// get selector

		AFlen = AF.length;																// selector push (AF)
		bAFDup = false;
		FN_full = FN.concat( fullType );

		if( ForceSubset ){
			for( var afi = 0 ; afi<AFlen ; afi++ ){
				AF_FN = AF[afi][0];
				if( AF_FN != FN ){ continue; }	//FN üũ

				bAFDup = true;
				if( AF[afi].toString().indexOf( selector ) > -1 ) { break; }	//selector �ߺ�üũ

				AF[afi].push( selector );
				bProcess = true;
				break;
			}

			// if first --> AF push
			if( !bAFDup ){
				var subarr = [];
				subarr.push( FN );
				subarr.push( varSUBSETFONT );
				subarr.push( selector );
				AF.push( subarr );
				bProcess = true;
			}
		}
		else{
			for( var afi = 0 ; afi<AFlen ; afi++ ){
				AF_FN = AF[afi][0];
				if( AF_FN != FN && AF_FN != FN_full ) { continue; }
				bAFDup = true;
				if( AF[afi].toString().indexOf( selector ) > -1 ) { break; }	//selector �ߺ�üũ

				if( AF_FN == FN_full ){
					ST = ST.concat( selector , txt6 , FN_full , txt7 );					// txt6 = "{font-family:'", txt7 = "' !important; letter-spacing:0px !important;}\n" ;
				}

				AF[afi].push( selector );
				bProcess = true;
				break;
			}

			// if first --> AF push
			if( !bAFDup ){
				var subarr = [];
				if( FF.indexOf( FN_full ) > -1 ){
					subarr.push( FN_full );
					subarr.push( varFULLSETFONT );
					subarr.push( selector );
					AF.push( subarr );
					bProcess = true;

					STT = STT.concat( txt3 , FN_full , FFS , FN_full , FFF );		//txt3 = "@font-face {\nfont-family: '";
					ST = ST.concat( selector , txt6 , FN_full , txt7 );					// txt6 = "{font-family:'", txt7 = "' !important; letter-spacing:0px !important;}\n" ;
				}
				else if( RSF.indexOf (FN) > -1){
					subarr.push( FN );
					subarr.push( varSUBSETFONT );
					subarr.push( selector );
					AF.push( subarr );
					bProcess = true;
				}
			}
		}
	} 

	if ( bProcess &&  ( STT != ""  || ST!= "" ))
	{
		var wi = window;
		wi.g_AFont = AF;
		wi.g_STT += STT;
		wi.g_ST += ST;
		return;
	}
	else{
		if ( bProcess ){
			window.g_AFont = AF;
		}

		if ( STT != ""  || ST!= "" ){ 
			var wi = window;
			wi.g_STT += STT;
			wi.g_ST += ST;
	//		AddNode( STT + ST );
		}
		return;
	}

};






var DetectCSS_Safari_AF = function DetectCSS_Safari_AF( rules, param ){
	var rlen = rules.length;
	if ( rlen < 1){	return ;	}

	var FFS = param.FFS,
		FFF = param.FFF, 
		fullType = param.fullType,
		AF = param.AF,
		FF = param.FF,
		FList = param.FList,
		RSF = param.RSF,								//����� ��Ʈ ����Ʈ
		ForceSubset = param.ForceSubset;		//�����������ȯ �÷���

	var tmp_rules,
		FN = "",													//���ϸ�
		F_arrLen = 0,										//���ϸ� ���� ����
		F_arr = [],											//���ϸ� ����
		varFONTFAMILY = "font-family", 
		selector = "",											// Ŭ������ ���̵�
		bAFDup = false,									//AF ó���� ����
		AFlen = 0,												//AF ó���� ����
		varFULLSETFONT = "FULLSETFONT",	//AFó���� ���
		varSUBSETFONT = "SUBSETFONT" ,		//AFó���� ���
		AF_FN = "",											//AF ó���� ����
		FN_full = "",											//Ǯ����Ʈ�� �̸�����
		ST = "",													//��Ÿ�� ó���� ����
		STT = "",												//��Ÿ�� ó���� ����
		txt3 = "@font-face {\nfont-family: '", 	//��Ÿ�� ó���� ����
		txt6 = "{font-family:'",								//��Ÿ�� ó���� ����
		txt7 = "' !important; letter-spacing:0px !important;}\n"; //��Ÿ�� ó���� ����

	var bProcess = false;


	//css dom check, make AF
	for (i=0 ; i<rlen ; i++){
		tmp_rules = rules[i];

		// check continue status 
		if( tmp_rules.type != 1 ) { continue; }

		FN = tmp_rules.style.getPropertyValue( varFONTFAMILY ) ; //"font-family"
		if ( !FN ) { 
			FN  = tmp_rules.style.getPropertyValue( "font" );	
			if ( !FN ) { continue; }
			if ( !FN.match(/\s/g) ) { continue; }		// �������� ���еȰ��� ������ �ùٸ��� ���� ����

			var TmpLen = FN.match( /\s/g ).length;	// ������ ����� ���Ѵ�
			for( var tli = 0 ; tli < TmpLen ; tli++ ){	// ��Ʈ�� �ƴѰ��� ��� ����
				spaceIdx = FN.indexOf(" ");
				commaIdx = FN.indexOf(",");
				if( (spaceIdx > commaIdx) && (commaIdx > -1))
					break;
				FN = FN.substr(spaceIdx+1, FN.length);
			}
		}
	
		FN = FN.replace( /\\|\"|\'| /gi, "" ).toLowerCase();
		if ( FN == "" ) { continue; }

		// check font fallback, get FN
		if ( FN.indexOf( "," ) > -1 ){													//���� ��Ÿ���̸� �ϳ��� üũ�ϰ�
			F_arr = FN.split( "," );
			FN = null;
			F_arrLen = F_arr.length;
			for( fi = 0 ; fi < F_arrLen ; fi++ ){
				if ( F_arr[ fi ].match( FList )[ 0 ] ) {							 //��Ʈ����Ʈ�� �ִ� ��Ʈ������ Ȯ���ϰ�
					FN = tmp_rules.style.fontFamily = F_arr[ fi ];			 //document.styleSheets[si].cssRules[i].style.fontFamily = FN;							
					break; 
				}
			}					
		}
		else{	//�Ѱ��� �ִ� ��Ÿ���̸� �Ѱ��� üũ
			if(	FList.match(FN) )
				FN = FList.match( FN )[0];
		}

		// FList�� ���� ��Ʈ���̸� skip
		if( !FN ) { continue; }

		// get selector
		selector = tmp_rules.selectorText;

		// selector push (AF)
		AFlen = AF.length;
		bAFDup = false;
		FN_full = FN.concat( fullType );

		if( ForceSubset ){ //������ ����� ��ȯ�ؾ��ϴ� ���
			for( afi = 0 ; afi<AFlen ; afi++ ){
				AF_FN = AF[afi][0];
				if( AF_FN != FN ){ continue; }	//FN üũ

				bAFDup = true;
				if( AF[afi].toString().indexOf( selector ) > -1 ) { break; }	//selector �ߺ�üũ

				AF[afi].push( selector );
				bProcess = true;
				break;
			}

			// if first --> AF push
			if( !bAFDup ){
				var subarr = [];
				subarr.push( FN );
				subarr.push( varSUBSETFONT );
				subarr.push( selector );
				AF.push( subarr );
				bProcess = true;
			}
		}
		else{
			for( afi = 0 ; afi<AFlen ; afi++ ){
				AF_FN = AF[afi][0];
				if( AF_FN != FN && AF_FN != FN_full ){ continue; }

				bAFDup = true;
				if( AF[afi].toString().indexOf( selector ) > -1 ) { break; }	//selector �ߺ�üũ

				if( AF_FN == FN_full ){
					ST = ST.concat( selector , txt6 , FN_full , txt7 );	// txt6 = "{font-family:'", txt7 = "' !important; letter-spacing:0px !important;}\n" ;
				}

				AF[afi].push( selector );
				bProcess = true;
				break;
			}

			// if first --> AF push
			if( !bAFDup ){
				var subarr = [];

				if( FF.indexOf( FN_full ) > -1 ){
					subarr.push( FN_full );
					subarr.push( varFULLSETFONT );
					subarr.push( selector );
					AF.push( subarr );
					bProcess = true;

					STT = STT.concat( txt3 , FN_full , FFS , FN_full , FFF );		//txt3 = "@font-face {\nfont-family: '";
					ST = ST.concat( selector , txt6 , FN_full , txt7 );					// txt6 = "{font-family:'", txt7 = "' !important; letter-spacing:0px !important;}\n" ;
				}
				else if( RSF.indexOf( FN) > -1) {
					subarr.push( FN );
					subarr.push( varSUBSETFONT );
					subarr.push( selector );
					AF.push( subarr );
					bProcess = true;
				}
			}

		}
	} //rule loop2 end

	if ( bProcess &&  ( STT != ""  || ST!= "" ))
	{
		var wi = window;
		wi.g_AFont = AF;
		wi.g_STT += STT;
		wi.g_ST += ST;
		return;
	}
	else{
		if ( bProcess ){
			window.g_AFont = AF;
		}

		if ( STT != ""  || ST!= "" ){ 
			var wi = window;
			wi.g_STT += STT;
			wi.g_ST += ST;
	//		AddNode( STT + ST );
		}
		return;
	}


};






var AddNode = function AddNode(ST){
	if ( ST == "" ){ return; }

	var doc = document,
	bT = window.g_bT;
	var sNode = doc.createElement( 'style' );
	sNode.setAttribute( 'type' , 'text/css' );

	if ( bT > -1 && bT <9 ){	// ie 7, 8
		doc.getElementsByTagName('head')[0].appendChild(sNode);
		sNode.styleSheet.cssText = ST;
	}
	else if ( bT > 8 ){			// ie 9 over
		sNode.styleSheet.cssText = ST;
		doc.getElementsByTagName('head')[0].appendChild(sNode);
	}
	else if ( bT == -1 ){		// chrome, ff, safari
		sNode.appendChild(doc.createTextNode(ST));
		doc.getElementsByTagName('head')[0].appendChild(sNode);
	}

};



var getCC = function getCC(){	//client_c üũ	
	var obj = document.getElementById("TypeEngine");
	if( !obj ) { return ""; }

	var URL = obj.getAttribute("src");
	var param = URL.substring( URL.indexOf("?") + 1, URL.length );
	var arr = param.split( "&" );
	var arrLen =  arr.length;
	var str = "";
	var client_c = "";
	var hp_id = "";

	for(var i = 0 ; i <arrLen ; i++ ){
		str = arr[i];

		 var name = str.substring( 0 , str.indexOf("=") );
		 if(!name){ continue; }		 
		 name = name.toLowerCase();		 
		 if(name != "client_c" && name!=="hp_id") { continue; }
		 
		 if(name==="client_c") {client_c = str.substring( str.indexOf("=") + 1, str.length );}
		 else if(name==="hp_id"){hp_id = str.substring(str.indexOf("=")+1, str.length );}

		 if(isNaN(parseInt(client_c))) {  client_c = ""; }
		 // if(isNaN(parseInt(hp_id))) { hp_id = "";}
	}
	// console.log('----------hp_id----------')
	// console.log(hp_id)
	return {"client_c":client_c, "hp_id":hp_id};
}





var GoReady = function GoReady(){
	ready(function(){


		//�Է°��� �������Ʈ, Ǯ��Ʈ�� �и�, �Է°��� �ߺ�üũ �� ���� ( RSF : recursive subset font )
		var wi = window,
			bT = wi.g_bT,
			host = wi.location.host;

		var data = { fullType : wi.g_FType + "full" /* OTF, TTF ���� */ ,
							ForceSubset : wi.g_ForceSubset /*��������¿���*/ ,
							src_ss : wi.g_Src_SS,
							src_fs : wi.g_Src_FS};

		var data2 = { FFS : wi.g_FFS, 
							FFF : wi.g_FFF , 
							fullType : data.fullType /*OTF, TTF ����*/,
							ForceSubset : data.ForceSubset /*��������¿���*/ ,
							FList : "",
							FF : "",
							RSF : "",
							AF : wi.g_AFont	};


		if(bT >0 && bT <9) {//ie 6~8 
			var doc = document,
				slen = doc.styleSheets.length,
				CT = "";

			for( var si = 0 ; si<slen ; si++ ){
				CT = doc.styleSheets[si].cssText;
				if ( CT != "" ){ 
					RecurseCSS_FList_IEOld( doc.styleSheets[si]  );
				}
			}
			if( wi.g_FList == "" ) {	return;	}

			data2.FList = wi.g_FList;
			data2.FF = wi.g_FF;
			data2.RSF = wi.g_RSF;

			for( var si = 0 ; si<slen ; si++ ){
				CT = doc.styleSheets[si].cssText;
				if ( CT != "" ){ 
					RecurseCSS_FN_IEOld ( doc.styleSheets[si] , data2 );
				}
			}
		}
		else {
			RecurseCSS( function(x, data, host, func){ RecurseMake(x, data, host, func);} , host , data, function(sheet, data){ DetectCSS_IEStd_FList(sheet, data);}  );		//DetectCSS_IEStd_FList : CSS import ó��  �Լ�

			if( wi.g_FList == "" ) { return; }
			data2.FList = wi.g_FList;
			data2.FF = wi.g_FF;
			data2.RSF = wi.g_RSF;

			if(wi.g_Browser != "safari")
				RecurseCSS( function(sheet, data, host, func){ RecurseMake(sheet, data, host, func);} , host , data, function(rules, data){ DetectCSS_IEStd_AF(rules, data2);} );		// DetectCSS_IEStd_AF : AF(allfont)�� ���� �Լ�
			else
				RecurseCSS( function(sheet, data, host, func){ RecurseMake(sheet, data, host, func);} , host , data, function(rules, data){ DetectCSS_Safari_AF(rules, data2);} );	// font-family �̿� font ó���߰��� �Լ� ȣ��
		}

		AddNode( wi.g_STT  + wi.g_ST);

		if ( wi.g_RSF == "" ){ return; }	// ������� ������ ��Ʈ�� �˻� ����

		//��Ʈ�� �˻�, �������Ʈ ������Ʈ�� �񵿱�ó��
		//��Ʈ�� Ž��(��Ʈ, ����) - recursive
		recurseNode( document.body, wi.g_RSF, wi.g_FT, wi.g_FN, function( att, objRegExFont, paramFT, paramFN ) {

			var NT, NN, NV; //��� �Ӽ� ����
			var pNode, pNode_FF, pNode_FF_match = ""; // �θ� ��� ���� ����

			//element�� text������ �ƴϸ� ��Ʈ/������ Ž������ �ʴ´�.
			NT = att.nodeType;
			if( NT != 1 && NT != 3 ){
				return;
			}

			//element������ script�� style�±��̸� ��Ʈ/���� Ž������ �ʴ´�.
			NN = att.nodeName;
			if( NN == "SCRIPT" || NN == "STYLE" ){
				return;
			}

			//�迭������ ���̰��� ������ �Ҵ�
			NV = att.nodeValue;
			if(!NV)
				return;

			//�ǹ̾��� ���� ����
			NV = NV.replace(/\n|\t|\r| /gi, '');
			if( NV == "" )
				return;

			//�θ��带 ���ÿ� ����
			pNode = att.parentNode;
			pNode_NN = pNode.nodeName;

			//�θ� �ʿ���� ������Ʈ�̸� ����
			if( pNode_NN == "SCRIPT" || pNode_NN == "STYLE" )
				return;

			//�θ���Ʈ ���ϱ�
			if( pNode.currentStyle )
				pNode_FF = pNode.currentStyle['fontFamily'];
			else
				pNode_FF = document.defaultView.getComputedStyle( pNode, null ).getPropertyValue( "font-family" );

			//�θ���Ʈ�� ������ ����
			if( pNode_FF == "" )
				return;


			//�θ���Ʈ�� ����Ʈ���� üũ
			pNode_FF = pNode_FF.toLowerCase().replace(/\"|\'/g, "");


			/////////////////////////
			if ( pNode_FF.indexOf( "," ) > -1 ){													//���� ��Ÿ���̸� �ϳ��� üũ�ϰ�
				F_arr = pNode_FF.split( "," );
				pNode_FF = null;
				F_arrLen = F_arr.length;
				for( var fi = 0 ; fi < F_arrLen ; fi++ ){
					//if ( F_arr[ fi ].match( objRegExFont ) ) {							 //��Ʈ����Ʈ�� �ִ� ��Ʈ������ Ȯ���ϰ�
					if ( objRegExFont.match( F_arr[ fi ] ) ) {							 //��Ʈ����Ʈ�� �ִ� ��Ʈ������ Ȯ���ϰ�
						pNode_FF = F_arr[ fi ];			 //document.styleSheets[si].cssRules[i].style.fontFamily = FN;							
						break; 
					}
				}					
			}
			////////////////////////

			if( !objRegExFont.match( pNode_FF ) ){
				return;
			}

			NV = NV.replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/\"/g,"&quot;").replace(/\'/g,"&#x27;").replace(/\[/g, "&#091;").replace(/\]/g, "&#093;").replace(/\)/g, "&#041;").replace(/\./g, "&#046;");
			pNode_FF_match = pNode_FF.replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/\[/g, "&#091;").replace(/\]/g, "&#093;").replace(/\)/g, "&#041;").replace(/\./g, "&#046;");

			//��Ʈ�� �ؽ�Ʈ�� �����迭�� ����
			var bDup = false,
				len = paramFT.length;

			for( var i=0 ; i<len ; i++ ){
				if( paramFN[i] == pNode_FF_match ){				
					paramFT[i] = paramFT[i].concat(NV);
					bDup = true;
					break;
				}
			}

			if( !bDup ){
				paramFT.push( pNode_FF_match.concat( "=== " , NV ) );
				paramFN.push( pNode_FF_match );
			}
		});


		//����SSF ��û
		setTimeout(function(){
			sendServer("full");					
		},1);

		
	});


};





/*
function ResetCss( rules, FList ){

	var rlen = rules.length;
	if ( rlen < 1){	return ;	}


	var tmp_rules,
		FN = "",													//���ϸ�
		F_arrLen = 0,										//���ϸ� ���� ����
		F_arr = [],											//���ϸ� ����
		varFONTFAMILY = "font-family";

	//css dom check, make AF
	for ( var i=0 ; i<rlen ; i++ ){
		tmp_rules = rules[i];
		
		if( tmp_rules.type != 1 ) { continue; }									// check continue status 

		FN = tmp_rules.style.getPropertyValue( varFONTFAMILY ) ; //"font-family"
		if ( !FN ) { continue; }															//safari�� ���, fon-family�� �νĸ��ϰ� font�� �ν���. 

		FN = FN.replace( /\\|\"|\'| /gi, "" ).toLowerCase();

		// check font fallback, get FN
		if ( FN.indexOf( "," ) > -1 ){													//���� ��Ÿ���̸� �ϳ��� üũ�ϰ�
			F_arr = FN.split( "," );
			F_arrLen = F_arr.length;
			for( var fi = 0 ; fi < F_arrLen ; fi++ ){
				if ( F_arr[ fi ].match( FList ) ) {							 //��Ʈ����Ʈ�� �ִ� ��Ʈ������ Ȯ���ϰ�
					rules[i].style.fontFamily = "";			 //document.styleSheets[si].cssRules[i].style.fontFamily = FN;							
					break; 
				}
			}					
		}
		else{	//�Ѱ��� �ִ� ��Ÿ���̸� �Ѱ��� üũ
			if(	 FList.match(FN) ){
				rules[i].style.fontFamily = "";
			}
		}
			
	} 

}
*/


//start  dup check
if(!g_fFMT){

	var g_bT = -1,						//browserType
		g_fFMT = "",						//fontFormat
		g_FT = [],							//server post�� ������
		g_FN = [],						//recursenode�� ���ϸ� ����
		g_AFont = [],					//AllFont
		g_Browser = "",					//������ �̸� string 

		g_FType = "T",					//��ƮŸ��(TTF , OTF)  - �������� ������Ҷ� �ʿ���.
		g_ForceSubset = false,	//Ǯ���� ���͵� �ڵ� ��������� ��ȯ�ؾ��ϴ� ���
		client_c,							//Ŭ���̾�Ʈ �ڵ�
		hp_id,							//����� ���̵�
		g_FList = "",
		g_FF = "",
		g_RSF = "",						 // css recursive �ؼ� Ǯ��,����� �� ����� ���μ������� ���. FList - ��Ʈ����Ʈ, FF - Ǯ����Ʈ����Ʈ, RSF - �������Ʈ����Ʈ
		g_STT = "", 
		g_ST = "";

	//ie�� ������ȣ�� ����, ie�ܴ̿� -1
	g_bT = BC();
	if ( g_bT > 0 ){	//IE�̸�
		g_fFMT = "eot";
	}
	else{
		g_fFMT = FC();			// chrome, safari, ff ...etc
	}

	client_c = getCC()["client_c"];
	hp_id = getCC()["hp_id"];

	//GET REAL SERVER ///////////////////////////////////////////
	var	SERVER_URL= "";
	var SI_ck = readCookie( "typeengine" );

	if( SI_ck ){
		SERVER_URL = SI_ck + ".typeengine.co.kr";
	}
	else{
		var tNo = Math.floor(Math.random() * 2);
		var tArr = ["k1", "k2"];
		SERVER_URL = tArr[tNo] + ".typeengine.co.kr";
		setCookie2( "typeengine" , tArr[tNo]);
	}

	var SERVER_POST = "http://" + SERVER_URL + ":8080/",
		g_FFS		= "'; src:url('http://" + SERVER_URL + "/index.php?name=",
		g_FFF		= "&format=" + g_fFMT + "&ucode=" + client_c + "&hp_id="+hp_id+"');}\n";

	var g_Src_SS = "load.typeengine.co.kr",										//"load.typeengine.co.kr";
		g_Src_FS = "load.typeengine.co.kr/?fullset";						//"load.typeengine.co.kr/?fullset"

	if( g_fFMT != "" && client_c != "")
		GoReady();
	


	//GET TEST SERVER ///////////////////////////////////////////
	// var SERVER_URL= "";
	// var SI_ck = readCookie( "webfonts" );

	// if( SI_ck ){
	// 	SERVER_URL = SI_ck + ".webfonts.co.kr";
	// }
	// else{
	// 	var tNo = Math.floor(Math.random() * 1);
	// 	var tArr = ["x1"];
	// 	SERVER_URL = tArr[tNo] + ".webfonts.co.kr";
	// 	setCookie2( "webfonts" , tArr[tNo]);
	// }

	// var SERVER_POST = "http://" + SERVER_URL + ":8080/",
	// 	g_FFS		= "'; src:url('http://" + SERVER_URL + "/?name=",
	// 	g_FFF		= "&format=" + g_fFMT + "&ucode=" + client_c + "&hp_id="+hp_id+"');}\n";


	// var g_Src_SS = "load.typeengine.co.kr",										//"load.typeengine.co.kr";
	// 	g_Src_FS = "load.typeengine.co.kr/?fullset";						//"load.typeengine.co.kr/?fullset"


	// if( g_fFMT != "" && client_c != "")
	// 	GoReady();



} //end dup check