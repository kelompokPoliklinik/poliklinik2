<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Table Examples</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/index.js"></script>
    <script src="ga.js"></script>
</head>
<body>


<!-- Fixed navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">Bootstrap Table Examples</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="https://github.com/wenzhixin/bootstrap-table" target="_blank">Bootstrap Table</a></li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Options <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="options/boolean-options.html">Boolean options</a></li>
                        <li><a href="options/from-html.html">From html</a></li>
                        <li><a href="options/from-data.html">From data</a></li>
                        <li><a href="options/modal-table.html">Modal Table</a></li>
                        <li><a href="options/table-style.html">Table Style</a></li>
                        <li><a href="options/no-bordered.html">No bordered</a></li>
                        <li><a href="options/aligning-columns.html">Aligning Columns</a></li>
                        <li><a href="options/basic-sort.html">Basic Sort</a></li>
                        <li><a href="options/custom-sort.html">Custom Sort</a></li>
                        <li><a href="options/format.html">Format</a></li>
                        <li><a href="options/basic-columns.html">Basic Columns</a></li>
                        <li><a href="options/large-columns.html">Large Columns</a></li>
                        <li><a href="options/disabled-checkbox.html">Disabled Checkbox</a></li>
                        <li><a href="options/custom-toolbar.html">Custom Toolbar</a></li>
                        <li><a href="options/detail-view.html">Detail View</a></li>
                        <li><a href="options/sub-table.html">Sub Table</a></li>
                        <li><a href="options/client-side-pagination.html">Client Side Pagination</a></li>
                        <li><a href="options/server-side-pagination.html">Server Side Pagination</a></li>
                        <li><a href="options/pagination-custom-text.html">Pagination Custom Text</a></li>
                        <li><a href="options/custom-ajax.html">Custom Ajax</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Methods <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="methods/getOptions.html">getOptions</a></li>
                        <li><a href="methods/getSelections.html">getSelections</a></li>
                        <li><a href="methods/getData.html">getData</a></li>
                        <li><a href="methods/load.html">load</a></li>
                        <li><a href="methods/append.html">append</a></li>
                        <li><a href="methods/prepend.html">prepend</a></li>
                        <li><a href="methods/remove.html">remove</a></li>
                        <li><a href="methods/insertRow.html">insertRow</a></li>
                        <li><a href="methods/updateRow.html">updateRow</a></li>
						<li><a href="methods/showRow-hideRow.html">showRow/hideRow</a></li>
                        <li><a href="methods/mergeCells.html">mergeCells</a></li>
                        <li><a href="methods/checkAll-uncheckAll.html">checkAll/uncheckAll</a></li>
                        <li><a href="methods/check-uncheck.html">check/uncheck</a></li>
                        <li><a href="methods/checkBy-uncheckBy.html">checkBy/uncheckBy</a></li>
                        <li><a href="methods/refresh.html">refresh</a></li>
                        <li><a href="methods/resetView.html">resetView</a></li>
                        <li><a href="methods/destroy.html">destroy</a></li>
                        <li><a href="methods/showLoading-hideLoading.html">showLoading/hideLoading</a></li>
                        <li><a href="methods/showColumn-hideCoulumn.html">showColumn/hideCoulumn</a></li>
                        <li><a href="methods/scrollTo.html">scrollTo</a></li>
                        <li><a href="methods/selectPage-prevPage-nextPage.html">selectPage/prevPage/nextPage</a></li>
                        <li><a href="methods/togglePagination.html">togglePagination</a></li>
                        <li><a href="methods/toggleView.html">toggleView</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Extensions <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="extensions/editable.html">Editable</a></li>
                        <li><a href="extensions/export.html">Export</a></li>
                        <li><a href="extensions/flat-json.html">Flat Json</a></li>
                        <li><a href="extensions/cookie.html">Cookie</a></li>
                        <li><a href="extensions/resizable.html">Resizable</a></li>
                        <li><a href="extensions/key-events.html">Key Events</a></li>
                        <li><a href="extensions/mobile.html">Mobile</a></li>
                        <li><a href="extensions/filter-control.html">Filter Control</a></li>
                        <li><a href="extensions/toolbar.html">Advanced toolbar</a></li>
                        <li><a href="extensions/reorder-columns.html">Reorder Columns</a></li>
                        <li><a href="extensions/reorder-rows.html">Reorder Rows</a></li>
                        <li><a href="extensions/multiple-sort.html">Multiple Sort</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Issues <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="issues/137.html">
137. Refresh from url after use data option
</a></li>
<li><a href="issues/152.html">
152. How to pass parameter to server
</a></li>
<li><a href="issues/177.html">
177. The Multiple Fields in Column
</a></li>
<li><a href="issues/188.html">
188. Show Export button only
</a></li>
<li><a href="issues/220.html">
220. Hide state column
</a></li>
<li><a href="issues/221.html">
221. Use cellStyle
</a></li>
<li><a href="issues/283.html">
283. Use resetView to reset the header width
</a></li>
<li><a href="issues/337.html">
337. Custom fontawsome icons
</a></li>
<li><a href="issues/350.html">
350. Support for data-field with dot notation
</a></li>
<li><a href="issues/353.html">
353. Use responseHandler option to handle your response data
</a></li>
<li><a href="issues/371.html">
371. Using table content in a HTML form
</a></li>
<li><a href="issues/383.html">
383. Use Flat UI to style the checkboxes
</a></li>
<li><a href="issues/386.html">
386. Override default queryParam variables
</a></li>
<li><a href="issues/395.html">
395. Enable/disable delete button on click checkbox
</a></li>
<li><a href="issues/406.html">
406. Align the toolbar and search input
</a></li>
<li><a href="issues/409.html">
409. Refresh method with new url
</a></li>
<li><a href="issues/415.html">
415. Get checked row index
</a></li>
<li><a href="issues/424.html">
424. Toggle pagination
</a></li>
<li><a href="issues/431.html">
431. Load pagination data
</a></li>
<li><a href="issues/457.html">
457. Set the global defaults for the table
</a></li>
<li><a href="issues/463.html">
463. Search invisible column
</a></li>
<li><a href="issues/561.html">
561. How to use the filter extension
</a></li>
<li><a href="issues/563.html">
563. Change the background color on selected rows
</a></li>
<li><a href="issues/579.html">
579. Show images formatter
</a></li>
<li><a href="issues/917.html">
917. Maintain selected on server side.
</a></li>
<li><a href="issues/986.html">
986. Editable select box
</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="navigation">
    <div class="container">
        <a class="previous" href="#">
            <i class="glyphicon glyphicon-arrow-left"></i>
            PREVIOUS: <span></span>
        </a>
        <a class="next" href="#">
            NEXT: <span></span>
            <i class="glyphicon glyphicon-arrow-right"></i>
        </a>
    </div>
</div>

<div class="ribbon">
    <a href="#" target="_blank">View Source on GitHub</a>
</div>

<div class="content">
    <iframe width="100%" height="100%"></iframe>
</div>
</body>
</html>
