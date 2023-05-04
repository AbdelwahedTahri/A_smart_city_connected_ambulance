<table class="table caption-top">

  <thead class="table-success">
    <tr>
      <th scope="col">Parameter</th>
      <th scope="col">Value</th>
    </tr>
  </thead>

  <tbody class="table-group-divider">

    <?php foreach($currentState as $property => $propertyValue): ?>
        <tr>
            <td><?= $property?></td>
            <td><?= $propertyValue?></td>
        </tr>
    <?php endforeach; ?>

  </tbody>

</table>