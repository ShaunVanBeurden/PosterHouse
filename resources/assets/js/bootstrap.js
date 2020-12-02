import jquery from 'jquery';
import bootstrap from 'bootstrap-sass';
import trumbowyg  from 'trumbowyg';
import axios from 'axios';
import select2 from 'select2';
import chart from 'chart.js';
import datetimepicker from 'eonasdan-bootstrap-datetimepicker';

require('./plugins/frontend');
require('./plugins/metisMenu');
require('./plugins/sb-admin-2');
require('./plugins/page_section');

import 'trumbowyg/plugins/upload/trumbowyg.upload';
import 'trumbowyg/plugins/pasteimage/trumbowyg.pasteimage';
import 'trumbowyg/plugins/noembed/trumbowyg.noembed';

window.$ = window.jQuery = jquery;
window.axios = axios;
window.trumbowyg = trumbowyg;
window.select2 = select2;
window.Chart = chart;
window.datetimepicker = datetimepicker;

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};

$.trumbowyg.svgPath = '/css/icons.svg';

$.fn.select2.defaults.set( "theme", "bootstrap" );