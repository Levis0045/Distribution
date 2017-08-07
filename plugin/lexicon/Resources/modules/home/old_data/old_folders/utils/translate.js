export function trans(...args) {
  return window.Translator.trans(...args)
}

export function transChoice(...args) {
  return window.Translator.transChoice(...args)
}

export function t(message) {
  return trans(message, {}, 'platform')
}

export function tex(message, placeholders = {}) {
  return trans(message, placeholders, 'claroline_lexicon')
}

export function tcex(message, amount, placeholders = {}) {
  const trans = transChoice(message, amount, placeholders, 'claroline_lexicon')

  return trans
}
