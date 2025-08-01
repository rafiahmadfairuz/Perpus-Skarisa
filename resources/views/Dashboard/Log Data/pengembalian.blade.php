 <x-app>
     <div class="col-md-12 ">
         <div class="card">
             <div class="card-header d-flex justify-content-between align-items-center">
                 <h4 class="card-title mb-0">Riwayat Pengembalian Buku</h4>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table  id="multi-filter-select" class="display table table-striped table-hover">
                         <thead>
                             <tr>
                                 <th>No</th>
                                 <th>Buku</th>
                                 <th>Peminjam</th>
                                 <th>Tgl Dikembalikan</th>
                             </tr>
                         </thead>
                         <tfoot>
                             <tr>
                                 <th>No</th>
                                 <th>Buku</th>
                                 <th>Peminjam</th>
                                 <th>Tgl Dikembalikan</th>
                             </tr>
                         </tfoot>
                         <tbody>
                             <tr>
                                 <td>1</td>
                                 <td>C++</td>
                                 <td>A002 - Bagus</td>
                                 <td>01/Jun/2020</td>
                             </tr>
                             <tr>
                                 <td>2</td>
                                 <td>Matematika</td>
                                 <td>A001 - Ana</td>
                                 <td>23/Jun/2020</td>
                             </tr>
                             <tr>
                                 <td>3</td>
                                 <td>RPL 2</td>
                                 <td>A005 - Edi</td>
                                 <td>23/Jun/2020</td>
                             </tr>
                             <tr>
                                 <td>4</td>
                                 <td>RPL 2</td>
                                 <td>A001 - Ana</td>
                                 <td>25/Jun/2020</td>
                             </tr>
                             <tr>
                                 <td>5</td>
                                 <td>Tutorial Coding Laravel</td>
                                 <td>A002 - Bagus</td>
                                 <td>01/Jul/2025</td>
                             </tr>
                             <tr>
                                 <td>6</td>
                                 <td>Tutorial Coding Laravel</td>
                                 <td>A006 - Rafi</td>
                                 <td>19/Jul/2025</td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </x-app>
 <script>
     $(document).ready(function() {
         $("#basic-datatables").DataTable({});

         $("#multi-filter-select").DataTable({
             pageLength: 5,
             initComplete: function() {
                 this.api()
                     .columns()
                     .every(function() {
                         var column = this;
                         var select = $(
                                 '<select class="form-select"><option value=""></option></select>'
                             )
                             .appendTo($(column.footer()).empty())
                             .on("change", function() {
                                 var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                 column
                                     .search(val ? "^" + val + "$" : "", true, false)
                                     .draw();
                             });

                         column
                             .data()
                             .unique()
                             .sort()
                             .each(function(d, j) {
                                 select.append(
                                     '<option value="' + d + '">' + d + "</option>"
                                 );
                             });
                     });
             },
         });

         // Add Row
         $("#add-row").DataTable({
             pageLength: 5,
         });

         var action =
             '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

         $("#addRowButton").click(function() {
             $("#add-row")
                 .dataTable()
                 .fnAddData([
                     $("#addName").val(),
                     $("#addPosition").val(),
                     $("#addOffice").val(),
                     action,
                 ]);
             $("#addRowModal").modal("hide");
         });
     });
 </script>
