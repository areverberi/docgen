# docgen
Generation of docx files from templates. uses phpdocx and mongodb

## Installation
Dropping the whole folder in a web root should be enough.
## Usage
Write a .docx file as usual. Insert fields inside it with the ${fieldname} notation. Then just upload it as a template.

Docgen extracts all field names and uses them to generate a list of available fields for the template. Documents can be generated by selecting the template and filling a form.

Templates as well as generated documents are saved as key-value hashes on a MongoDb database
