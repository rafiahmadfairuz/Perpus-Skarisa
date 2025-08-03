 <x-app>
     <div class="col-md-12 ">
         <div class="card">
             <div class="card-header d-flex justify-content-between align-items-center">
                 <h4 class="card-title mb-0">Riwayat Peminjaman Buku</h4>
             </div>
             <div class="card-body">
                 <div class="table-responsive">
                     <table id="multi-filter-select" class="display table table-striped table-hover">
                         <thead>
                             <tr>
                                 <th>No</th>
                                 <th>Buku</th>
                                 <th>Peminjam</th>
                                 <th>Tgl Peminjaman</th>
                             </tr>
                         </thead>
                         <tfoot>
                             <tr>
                                 <th>No</th>
                                 <th>Buku</th>
                                 <th>Peminjam</th>
                                 <th>Tgl Peminjaman</th>
                             </tr>
                         </tfoot>
                         <tbody>
                             @foreach ($dataPeminjam as $no => $item)
                                 <tr>
                                     <td>{{ $no + 1 }}</td>
                                     <td>{{ $item->buku->judul_buku ?? 'Tidak diketahui' }}</td>
                                     <td>{{ $item->id_anggota }} - {{ $item->anggota->nama ?? 'Tidak diketahui' }}</td>
                                     <td>{{ \Carbon\Carbon::parse($item->tgl_pinjam)->translatedFormat('d/M/Y') }}</td>
                                 </tr>
                             @endforeach
                             @if ($dataPeminjam->isEmpty())
                                 <tr>
                                     <td colspan="4" class="text-center">Tidak ada data pengembalian.</td>
                                 </tr>
                             @endif
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
             pageLength: 10,
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
