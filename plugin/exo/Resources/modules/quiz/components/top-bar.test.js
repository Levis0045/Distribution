import React from 'react'
import {shallow, mount} from 'enzyme'
import {spyConsole, renew, ensure, mockTranslator, mockRouting} from './../../utils/test'
import {TopBar} from './top-bar.jsx'

describe('<TopBar/>', () => {
  beforeEach(() => {
    spyConsole.watch()
    renew(TopBar, 'TopBar')
    mockTranslator()
    mockRouting()
  })
  afterEach(spyConsole.restore)

  it('has required props', () => {
    shallow(<TopBar/>)
    ensure.missingProps(
      'TopBar',
      ['id', 'empty', 'published', 'updateViewMode', 'saveQuiz']
    )
  })

  it('has typed props', () => {
    shallow(
      <TopBar
        id={[]}
        empty={[]}
        published={{}}
        updateViewMode={[]}
        saveQuiz={[]}
      />
    )
    ensure.invalidProps(
      'TopBar',
      ['id', 'empty', 'published', 'updateViewMode', 'saveQuiz']
    )
  })

  it('renders a navbar', () => {
    const navbar = mount(
      <TopBar
        id="123"
        empty={true}
        published={false}
        updateViewMode={() => {}}
        saveQuiz={() => {}}
      />
    )
    ensure.propTypesOk()
    ensure.equal(navbar.find('nav').length, 1)
  })
})