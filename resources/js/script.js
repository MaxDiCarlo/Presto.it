document.getElementById('addFileInput').addEventListener('click', function() {
    var container = document.getElementById('fileInputsContainer');
    var index = container.children.length;
    var div = document.createElement('div');
    div.classList.add('mb-3');
    div.innerHTML = `
          <label for="img[` + index + `]" class="form-label">File</label>
          <input type="file" class="form-control" id="img[` + index + `]" name="img[` + index + `]" wire:model="img.` + index + `">
      `;
    container.appendChild(div);
  });