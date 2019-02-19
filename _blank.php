<?php require_once '_header.php'; ?>
<?php require_once '_sidebar.php'; ?>
<html>
        <head>
                <title>HTML Table Paging Example</title>
                <script type="text/javascript">
                        var employees;
                        var tbody;
                        var rows;
                        var rowCount = 0;
                        var pageSize = 10;
                        var pageIndex = 0;
                        var pages = 0;
                        
                        function init(){
                                employees = document.getElementById("employees");
                                tbody = employees.getElementsByTagName("tbody")[0];
                                rows = tbody.getElementsByTagName("tr");
                                rowCount = rows.length;
                                pages = Math.ceil(rowCount / pageSize);
                                
                                for ( var i=1; i <= pages; i++){
                                        var paging = document.getElementById("paging");
                                        paging.innerHTML += "<span onclick='selectPage(" + i + ");'>" + i + "</span>";
                                }
                        }
                        
                        function selectPage(pageIndex){
                                var current = (pageSize * (pageIndex - 1));
                                var next = current + pageSize;
                                
                                for (var idx =0; idx < current; idx++){
                                        rows[idx].style.display ='none';
                                }
                                
                                
                                for (var idx = current; idx < next; idx++){
                                        rows[idx].style.display = 'table-row';
                                }
                                
                                
                                for (var idx = next; idx < rowCount; idx++){
                                        rows[idx].style.display ='none';
                                }
                        }
                </script>
                <style>
                        table { border-collapse:collapse; border:1px solid #999; width:90%; }
                        th, td { border:1px solid #999; padding:3px; }
                        tfoot td span { border:1px solid #888; padding:3px; cursor:pointer; display:inline-block; margin-right:1px; }
                </style>
        </head>
        <body>
                <table id="employees">
                        <thead>
                                <tr>
                                        <th>Prénom - Nom - Téléphone</th>
                                        <th>Détals</th>
                                        <th>Email</th>
                                </tr>
                        </thead>
                        <tbody>
                               <?php echo $show;?>
                        </tbody>
                        <tfoot>
                                <tr>
                                        <td colspan="3" id="paging">
                                        </td>
                                </tr>
                </table>
                <script type="text/javascript">
                        init();
                        selectPage(1);
                </script>               
        </body>
</html>
<?php require_once '_footer.php'; ?>