import React from 'react';
import { motion } from 'framer-motion';
import { Star, Quote } from 'lucide-react';

const Testimonials = () => {
  const testimonials = [
    {
      name: 'Maria Fernanda',
      age: '35 anos',
      treatment: 'Tratamento Facial Completo',
      rating: 5,
      text: 'A experiência na Serenity foi transformadora. O ambiente é incrivelmente acolhedor e os profissionais são extremamente qualificados. Minha pele nunca esteve tão radiante!',
      image: 'https://images.pexels.com/photos/3785077/pexels-photo-3785077.jpeg?auto=compress&cs=tinysrgb&w=150&h=150&fit=crop'
    },
    {
      name: 'Ana Paula',
      age: '42 anos',
      treatment: 'Drenagem Linfática',
      rating: 5,
      text: 'Depois de anos procurando um lugar que realmente entendesse minhas necessidades, encontrei na Serenity o cuidado que eu precisava. Recomendo de olhos fechados!',
      image: 'https://images.pexels.com/photos/3785079/pexels-photo-3785079.jpeg?auto=compress&cs=tinysrgb&w=150&h=150&fit=crop'
    },
    {
      name: 'Carla Santos',
      age: '28 anos',
      treatment: 'Microagulhamento',
      rating: 5,
      text: 'O atendimento é impecável desde a recepção até o final do tratamento. Sinto-me renovada a cada visita. A Serenity se tornou meu refúgio de bem-estar.',
      image: 'https://images.pexels.com/photos/3785081/pexels-photo-3785081.jpeg?auto=compress&cs=tinysrgb&w=150&h=150&fit=crop'
    },
    {
      name: 'Juliana Costa',
      age: '38 anos',
      treatment: 'Massagem Relaxante',
      rating: 5,
      text: 'Cada detalhe é pensado para proporcionar uma experiência única. Os resultados superaram minhas expectativas e o ambiente é simplesmente perfeito.',
      image: 'https://images.pexels.com/photos/3785083/pexels-photo-3785083.jpeg?auto=compress&cs=tinysrgb&w=150&h=150&fit=crop'
    },
    {
      name: 'Patricia Lima',
      age: '45 anos',
      treatment: 'Peeling Químico',
      rating: 5,
      text: 'A Dra. Marina e sua equipe são excepcionais. O cuidado e a atenção aos detalhes fazem toda a diferença. Minha autoestima está nas alturas!',
      image: 'https://images.pexels.com/photos/3785085/pexels-photo-3785085.jpeg?auto=compress&cs=tinysrgb&w=150&h=150&fit=crop'
    },
    {
      name: 'Renata Oliveira',
      age: '31 anos',
      treatment: 'Harmonização Facial',
      rating: 5,
      text: 'Resultado natural e exatamente como eu sonhava. A equipe é muito profissional e me senti segura durante todo o processo. Voltarei sempre!',
      image: 'https://images.pexels.com/photos/3785087/pexels-photo-3785087.jpeg?auto=compress&cs=tinysrgb&w=150&h=150&fit=crop'
    }
  ];

  return (
    <section className="py-20 bg-gradient-to-b from-cream-50 to-white">
      <div className="container mx-auto px-4 sm:px-6 lg:px-8">
        {/* Header */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
          viewport={{ once: true }}
          className="text-center mb-16"
        >
          <span className="text-gold-600 font-medium text-sm uppercase tracking-wider">Depoimentos</span>
          <h2 className="font-serif text-4xl lg:text-5xl font-bold text-sage-800 mt-2 mb-6">
            O que nossos
            <span className="block text-gold-600">Clientes dizem</span>
          </h2>
          <p className="text-lg text-sage-600 max-w-2xl mx-auto">
            A satisfação dos nossos clientes é nossa maior conquista. Veja o que eles têm a dizer 
            sobre sua experiência na Serenity Clinic.
          </p>
        </motion.div>

        {/* Testimonials Grid */}
        <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          {testimonials.map((testimonial, index) => (
            <motion.div
              key={index}
              className="bg-white rounded-2xl p-6 shadow-lg border border-cream-200 hover:shadow-xl transition-all duration-300"
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              transition={{ delay: index * 0.1, duration: 0.6 }}
              viewport={{ once: true }}
              whileHover={{ y: -5 }}
            >
              {/* Quote Icon */}
              <div className="flex justify-between items-start mb-4">
                <Quote className="text-gold-400" size={32} />
                <div className="flex space-x-1">
                  {[...Array(testimonial.rating)].map((_, i) => (
                    <Star key={i} className="text-gold-400" size={16} fill="currentColor" />
                  ))}
                </div>
              </div>

              {/* Testimonial Text */}
              <p className="text-sage-600 leading-relaxed mb-6 italic">
                "{testimonial.text}"
              </p>

              {/* Client Info */}
              <div className="flex items-center space-x-4">
                <img
                  src={testimonial.image}
                  alt={testimonial.name}
                  className="w-12 h-12 rounded-full object-cover border-2 border-gold-200"
                />
                <div>
                  <h4 className="font-semibold text-sage-800">{testimonial.name}</h4>
                  <p className="text-sm text-sage-500">{testimonial.age}</p>
                  <p className="text-xs text-gold-600 font-medium">{testimonial.treatment}</p>
                </div>
              </div>
            </motion.div>
          ))}
        </div>

        {/* Stats Section */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
          viewport={{ once: true }}
          className="mt-20 bg-gradient-to-r from-sage-50 to-gold-50 rounded-2xl p-8 lg:p-12"
        >
          <div className="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center">
            <div>
              <div className="font-serif text-4xl font-bold text-sage-800 mb-2">98%</div>
              <div className="text-sage-600 text-sm">Taxa de Satisfação</div>
            </div>
            <div>
              <div className="font-serif text-4xl font-bold text-sage-800 mb-2">5000+</div>
              <div className="text-sage-600 text-sm">Clientes Atendidos</div>
            </div>
            <div>
              <div className="font-serif text-4xl font-bold text-sage-800 mb-2">15+</div>
              <div className="text-sage-600 text-sm">Anos de Experiência</div>
            </div>
            <div>
              <div className="font-serif text-4xl font-bold text-sage-800 mb-2">4.9</div>
              <div className="text-sage-600 text-sm">Avaliação Média</div>
            </div>
          </div>
        </motion.div>

        {/* CTA Section */}
        <motion.div
          initial={{ opacity: 0, y: 30 }}
          whileInView={{ opacity: 1, y: 0 }}
          transition={{ duration: 0.8 }}
          viewport={{ once: true }}
          className="mt-16 text-center"
        >
          <h3 className="font-serif text-2xl font-semibold text-sage-800 mb-4">
            Faça parte da nossa família de clientes satisfeitos
          </h3>
          <p className="text-sage-600 mb-6">
            Agende sua consulta e descubra por que somos a escolha de milhares de pessoas.
          </p>
          <motion.button
            className="bg-gold-500 hover:bg-gold-600 text-white px-8 py-3 rounded-full font-semibold transition-colors duration-200"
            whileHover={{ scale: 1.05 }}
            whileTap={{ scale: 0.95 }}
            onClick={() => document.querySelector('#booking')?.scrollIntoView({ behavior: 'smooth' })}
          >
            Agendar Minha Consulta
          </motion.button>
        </motion.div>
      </div>
    </section>
  );
};

export default Testimonials;