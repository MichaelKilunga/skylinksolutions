import os
import re

directory = r'd:\DEVELOPMENT\skylinksolutionswebsite\resources\views\admin'

replacements = [
    (r'var\(--bg-sidebar\)', r'var(--bg-card)'),
    (r'rgba\(\s*255\s*,\s*255\s*,\s*255\s*,\s*0\.0[4-6]\s*\)', r'var(--bg-card)'),
    (r'1px solid rgba\(\s*255\s*,\s*255\s*,\s*255\s*,\s*0\.08\s*\)', r'1px solid var(--border)'),
    (r'1px solid rgba\(\s*255\s*,\s*255\s*,\s*255\s*,\s*0\.1\s*\)', r'1px solid var(--border)'),
    (r'color:\s*#cbd5e1', r'color: var(--text-muted)'),
    (r'color:\s*#e2e8f0', r'color: var(--text)'),
    (r'color:\s*#94a3b8', r'color: var(--text-muted)'),
]

exclude_dirs = ['auth', 'layouts']

for root, dirs, files in os.walk(directory):
    dirs[:] = [d for d in dirs if d not in exclude_dirs]
    for file in files:
        if file.endswith('.blade.php'):
            filepath = os.path.join(root, file)
            with open(filepath, 'r', encoding='utf-8') as f:
                content = f.read()
            
            new_content = content
            for pattern, repl in replacements:
                new_content = re.sub(pattern, repl, new_content)
            
            # Specific fixes for color: #fff;
            # Replace color: #fff in inline styles
            new_content = re.sub(r'(style="[^"]*?color:\s*)#fff(;|(?=\s*"))', r'\1var(--text)\2', new_content)
            new_content = re.sub(r'(style=\'[^\']*?color:\s*)#fff(;|(?=\s*\'))', r'\1var(--text)\2', new_content)
            
            # Replace color: #fff in .card-title and .form-control inside <style>
            new_content = re.sub(r'(\.card-title\s*\{[^}]*?color:\s*)#fff(;|(?=\s*\}))', r'\1var(--text)\2', new_content)
            new_content = re.sub(r'(\.form-control\s*\{[^}]*?color:\s*)#fff(;|(?=\s*\}))', r'\1var(--text)\2', new_content)

            # Let's also do a blanket replace for `color: #fff;` if it's on a div with font-weight for title
            new_content = re.sub(r'<div style="font-weight: 600; color: #fff;">', r'<div style="font-weight: 600; color: var(--text);">', new_content)

            if new_content != content:
                with open(filepath, 'w', encoding='utf-8') as f:
                    f.write(new_content)
                print(f'Updated {filepath}')
