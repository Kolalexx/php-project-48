### Hexlet tests and linter status:
[![Actions Status](https://github.com/Kolalexx/php-project-48/workflows/hexlet-check/badge.svg)](https://github.com/Kolalexx/php-project-48/actions)
[![test and lint](https://github.com/Kolalexx/php-project-48/actions/workflows/testAndLint.yml/badge.svg)](https://github.com/Kolalexx/php-project-48/actions/workflows/testAndLint.yml)
[![Maintainability](https://api.codeclimate.com/v1/badges/ad0f0e9d7f2e961eb1e2/maintainability)](https://codeclimate.com/github/Kolalexx/php-project-48/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/ad0f0e9d7f2e961eb1e2/test_coverage)](https://codeclimate.com/github/Kolalexx/php-project-48/test_coverage)

## Difference Calculator
Difference Calculator is a command line tool for finding differences in configuration files (JSON, YAML). It generates reports in the form of plain text, tree and json.

### Usage
  gendiff (-h|--help)
  
  gendiff (-v|--version)
  
  gendiff [--format <fmt>] <firstFile> <secondFile>
  
### Report formats:
<ul>
<li>plain
<li>stylish
<li>json
</ul>

### Requirements

PHP: >= 7.4

Composer: ^2.3

GNU make: ^4.2

### Setup

```sh
$ git clone git@github.com:Kolalexx/php-project-48.git

$ cd php-project-48

$ make install
```

### Example:

[![asciicast](https://asciinema.org/a/7HZyQl2zgEvwoikpp4yJsekqH.svg)](https://asciinema.org/a/7HZyQl2zgEvwoikpp4yJsekqH)
