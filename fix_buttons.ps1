$directory = "d:\DEVELOPMENT\skylinksolutionswebsite\resources\views\admin"

Get-ChildItem -Path $directory -Recurse -Filter *.blade.php | ForEach-Object {
    $file = $_.FullName
    $content = Get-Content $file -Raw

    # Restore white text for topbar buttons that have var(--primary) or #007bff backgrounds
    $newContent = [regex]::Replace($content, '(style="[^"]*?background:\s*(?:var\(--primary\)|#007bff)[^"]*?color:\s*)var\(--text\)(;|(?=\s*"))', '${1}#fff$2')
    
    # Also restore white text for primary buttons that might have been changed to var(--text)
    # Wait, in the previous script I only changed color: #fff to color: var(--text).
    # If the button had color: #fff; it was changed to var(--text).
    # But .btn-primary is usually defined in CSS, not inline.
    
    # We just need to fix inline styles that explicitly set background to primary but color got replaced to --text.
    
    if ($newContent -cne $content) {
        Set-Content -Path $file -Value $newContent
        Write-Output "Fixed button color in $file"
    }
}
