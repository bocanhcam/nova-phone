import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-phone', IndexField)
  app.component('detail-phone', DetailField)
  app.component('form-phone', FormField)
})
