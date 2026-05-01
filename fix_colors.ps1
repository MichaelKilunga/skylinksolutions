$directory = "d:\DEVELOPMENT\skylinksolutionswebsite\resources\views\admin"
$exclude = @("auth", "layouts")

Get-ChildItem -Path $directory -Recurse -Filter *.blade.php | Where-Object { 
    $path = $_.FullName
    $skip = $false
    foreach ($ex in $exclude) {
        if ($path -match "\\$ex\\") { $skip = $true; break }
    }
    -not $skip 
} | ForEach-Object {
    $file = $_.FullName
    $content = Get-Content $file -Raw

    $newContent = $content -replace 'var\(--bg-sidebar\)', 'var(--bg-card)'
    $newContent = $newContent -replace 'rgba\(\s*255\s*,\s*255\s*,\s*255\s*,\s*0\.0[4-6]\s*\)', '#fff'
    $newContent = $newContent -replace 'rgba\(\s*255\s*,\s*255\s*,\s*255\s*,\s*0\.05\s*\)', '#fff'
    $newContent = $newContent -replace '1px solid rgba\(\s*255\s*,\s*255\s*,\s*255\s*,\s*0\.08\s*\)', '1px solid var(--border)'
    $newContent = $newContent -replace '1px solid rgba\(\s*255\s*,\s*255\s*,\s*255\s*,\s*0\.1\s*\)', '1px solid var(--border)'
    $newContent = $newContent -replace 'color:\s*#cbd5e1', 'color: var(--text-muted)'
    $newContent = $newContent -replace 'color:\s*#e2e8f0', 'color: var(--text)'
    $newContent = $newContent -replace 'color:\s*#94a3b8', 'color: var(--text-muted)'
    
    $newContent = [regex]::Replace($newContent, '(style="[^"]*?color:\s*)#fff(;|(?=\s*"))', '${1}var(--text)$2')
    $newContent = [regex]::Replace($newContent, '(style=''[^'']*?color:\s*)#fff(;|(?=\s*''))', '${1}var(--text)$2')
    $newContent = [regex]::Replace($newContent, '(\.card-title\s*\{[^}]*?color:\s*)#fff(;|(?=\s*\}))', '${1}var(--text)$2')
    $newContent = [regex]::Replace($newContent, '(\.form-control\s*\{[^}]*?color:\s*)#fff(;|(?=\s*\}))', '${1}var(--text)$2')
    $newContent = $newContent -replace '<div style="font-weight: 600; color: #fff;">', '<div style="font-weight: 600; color: var(--text);">'

    if ($newContent -cne $content) {
        Set-Content -Path $file -Value $newContent
        Write-Output "Updated $file"
    }
}
