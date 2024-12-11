import { faker } from '@faker-js/faker'

const randomParagraphs = faker.lorem.paragraphs(30, '</p>\n<p>')

document.querySelector('.faker-paragraphs').insertAdjacentHTML('beforeend', randomParagraphs)
