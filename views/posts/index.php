<table id="example" class="table table-striped display nowrap" style="width:100%">
    <thead>
    <tr>
        <th>ad_id</th>
        <th>impressions</th>
        <th>clicks</th>
        <th>unique_clicks</th>
        <th>leads</th>
        <th>conversion</th>
        <th>roi</th>
    </tr>
    <tr>
        <th>ad_id</th>
        <th>impressions</th>
        <th>clicks</th>
        <th>unique_clicks</th>
        <th>leads</th>
        <th>conversion</th>
        <th>roi</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($posts as $post) { ?>
        <tr>
            <td><?php echo $post->ad_id; ?></td>
            <td><?php echo $post->impressions; ?></td>
            <td><?php echo $post->clicks; ?></td>
            <td><?php echo $post->unique_clicks; ?></td>
            <td><?php echo $post->leads; ?></td>
            <td><?php echo $post->conversion; ?></td>
            <td><?php echo $post->roi; ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<script>
    $('#example thead tr:eq(1) th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Пошук по '+title+'" class="column_search" />' );
    } );

    var table = $('#example').DataTable({
        orderCellsTop: true,
        order: [[1, 'asc']],
        language: {
            url: '//cdn.datatables.net/plug-ins/2.0.2/i18n/uk.json',
        },

    });

    $( '#example thead'  ).on( 'keyup', ".column_search",function () {
        table
            .column( $(this).parent().index() )
            .search( this.value )
            .draw();
    } );
</script>

